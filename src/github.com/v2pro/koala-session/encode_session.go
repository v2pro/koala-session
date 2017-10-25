package koala_session

import (
	"github.com/v2pro/koala/recording"
	"unsafe"
)

type SessionEncoder struct {
	Output []byte
	Error  error
}

func (encoder *SessionEncoder) Encode(session *recording.Session) {
	if len(session.SessionId) > 0 {
		encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x01}...)
		encoder.encodeString(session.SessionId)
	}
	if session.CallFromInbound != nil {
		encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x02}...)
		encoder.encodeCallFromInbound(session.CallFromInbound)
	}
}

func (encoder *SessionEncoder) encodeCallFromInbound(callFromInbound *recording.CallFromInbound) {
	encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x01}...)
	encoder.encodeBaseAction(&callFromInbound.BaseAction)
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodeBaseAction(baseAction *recording.BaseAction) {
	encoder.Output = append(encoder.Output, []byte{0x0a, 0x00, 0x01}...)
	encoder.encodeUInt64(uint64(baseAction.ActionIndex))
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodeUInt64(val uint64) {
	tmp := []byte{
		byte(val >> 56),
		byte(val >> 48),
		byte(val >> 40),
		byte(val >> 32),
		byte(val >> 24),
		byte(val >> 16),
		byte(val >> 8),
		byte(val),
	}
	encoder.Output = append(encoder.Output, tmp...)
}

func (encoder *SessionEncoder) encodeString(str string) {
	encoder.encodeBinary(*(*[]byte)((unsafe.Pointer)(&str)))
}

func (encoder *SessionEncoder) encodeBinary(bin []byte) {
	length := len(bin)
	tmp := []byte{
		byte(length >> 24),
		byte(length >> 16),
		byte(length >> 8),
		byte(length),
	}
	encoder.Output = append(encoder.Output, tmp...)
	encoder.Output = append(encoder.Output, bin...)
}
