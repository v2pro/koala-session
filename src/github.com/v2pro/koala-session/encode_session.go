package koala_session

import (
	"github.com/v2pro/koala/recording"
	"unsafe"
	"net"
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
	if session.ReturnInbound != nil {
		encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x03}...)
		encoder.encodeReturnInbound(session.ReturnInbound)
	}
	if len(session.Actions) > 0 {
		encoder.Output = append(encoder.Output, []byte{0x0f, 0x00, 0x04}...)
		encoder.encodeUInt32(uint32(len(session.Actions)))
		for _, action := range session.Actions {
			encoder.encodeAction(action)
		}
	}
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodeAction(action recording.Action) {
	switch typedAction := action.(type) {
	case *recording.ReturnInbound:
		encoder.encodeReturnInbound(typedAction)
	}
}

func (encoder *SessionEncoder) encodeReturnInbound(returnInbound *recording.ReturnInbound) {
	encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x01}...)
	encoder.encodeBaseAction(&returnInbound.BaseAction)
	if len(returnInbound.Response) > 0 {
		encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x02}...)
		encoder.encodeBinary(returnInbound.Response)
	}
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodeCallFromInbound(callFromInbound *recording.CallFromInbound) {
	encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x01}...)
	encoder.encodeBaseAction(&callFromInbound.BaseAction)
	encoder.Output = append(encoder.Output, []byte{0x0c, 0x00, 0x02}...)
	encoder.encodePeer(&callFromInbound.Peer)
	if len(callFromInbound.Request) > 0 {
		encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x03}...)
		encoder.encodeBinary(callFromInbound.Request)
	}
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodeBaseAction(baseAction *recording.BaseAction) {
	encoder.Output = append(encoder.Output, []byte{0x0a, 0x00, 0x01}...)
	encoder.encodeUInt64(uint64(baseAction.ActionIndex))
	encoder.Output = append(encoder.Output, []byte{0x0a, 0x00, 0x02}...)
	encoder.encodeUInt64(uint64(baseAction.OccurredAt))
	encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x03}...)
	encoder.encodeString(baseAction.ActionType)
	encoder.Output = append(encoder.Output, 0x00)
}

func (encoder *SessionEncoder) encodePeer(peer *net.TCPAddr) {
	encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x01}...)
	encoder.encodeBinary(peer.IP)
	encoder.Output = append(encoder.Output, []byte{0x0a, 0x00, 0x02}...)
	encoder.encodeUInt64(uint64(peer.Port))
	if len(peer.Zone) > 0 {
		encoder.Output = append(encoder.Output, []byte{0x0b, 0x00, 0x03}...)
		encoder.encodeString(peer.Zone)
	}
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

func (encoder *SessionEncoder) encodeUInt32(val uint32) {
	tmp := []byte{
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
