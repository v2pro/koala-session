package koala_session

import (
	"encoding/binary"
	"encoding/hex"
	"errors"
)

type SessionDecoder struct {
	Input []byte
	Error error
}

func (decoder *SessionDecoder) SkipSession() {
	decoder.Skip_Session_SessionId()
	if decoder.Decode_Session_CallFromInbound() {
		if decoder.Decode_CallFromInbound_BaseAction() {
			decoder.Skip_BaseAction_ActionIndex()
			decoder.Skip_BaseAction_OccurredAt()
			decoder.Skip_BaseAction_ActionType()
			decoder.SkipRemainingFields()
		}
		if decoder.Decode_CallFromInbound_Peer() {
			decoder.Skip_Peer_IP()
			decoder.Skip_Peer_Port()
			decoder.Skip_Peer_Zone()
			decoder.SkipRemainingFields()
		}
		decoder.Skip_CallFromInbound_Request()
		decoder.SkipRemainingFields()
	}
	if decoder.Decode_Session_ReturnInbound() {
		if decoder.Decode_ReturnInbound_BaseAction() {
			decoder.Skip_BaseAction_ActionIndex()
			decoder.Skip_BaseAction_OccurredAt()
			decoder.Skip_BaseAction_ActionType()
			decoder.SkipRemainingFields()
		}
		decoder.Skip_ReturnInbound_Response()
		decoder.SkipRemainingFields()
	}
}

func (decoder *SessionDecoder) SkipRemainingFields() {
	if decoder.Input[0] != 0 {
		if decoder.Error == nil {
			decoder.Error = errors.New("expect struct end: " + hex.EncodeToString(decoder.Input))
		}
		return
	}
	decoder.Input = decoder.Input[1:]
}

func (decoder *SessionDecoder) Decode_Session_SessionId() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_Session_SessionId() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) Decode_Session_CallFromInbound() bool {
	if decoder.Input[0] == 0x0c && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		decoder.Input = decoder.Input[3:]
		return true
	}
	return false
}

func (decoder *SessionDecoder) Decode_CallFromInbound_BaseAction() bool {
	if decoder.Input[0] == 0x0c && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		decoder.Input = decoder.Input[3:]
		return true
	}
	return false
}

func (decoder *SessionDecoder) Decode_BaseAction_ActionIndex() uint64 {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		return decoder.decodeUInt64()
	}
	return 0
}

func (decoder *SessionDecoder) Skip_BaseAction_ActionIndex() {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		decoder.Input = decoder.Input[11:]
	}
}

func (decoder *SessionDecoder) Decode_BaseAction_OccurredAt() uint64 {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		return decoder.decodeUInt64()
	}
	return 0
}

func (decoder *SessionDecoder) Skip_BaseAction_OccurredAt() {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		decoder.Input = decoder.Input[11:]
	}
}

func (decoder *SessionDecoder) Decode_BaseAction_ActionType() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_BaseAction_ActionType() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) Decode_CallFromInbound_Peer() bool {
	if decoder.Input[0] == 0x0c && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		decoder.Input = decoder.Input[3:]
		return true
	}
	return false
}

func (decoder *SessionDecoder) Decode_Peer_IP() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_Peer_IP() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) Decode_Peer_Port() uint64 {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		return decoder.decodeUInt64()
	}
	return 0
}

func (decoder *SessionDecoder) Skip_Peer_Port() {
	if decoder.Input[0] == 0x0a && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		decoder.Input = decoder.Input[11:]
	}
}

func (decoder *SessionDecoder) Decode_Peer_Zone() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_Peer_Zone() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) Decode_CallFromInbound_Request() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_CallFromInbound_Request() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) Decode_Session_ReturnInbound() bool {
	if decoder.Input[0] == 0x0c && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x03 {
		decoder.Input = decoder.Input[3:]
		return true
	}
	return false
}

func (decoder *SessionDecoder) Decode_ReturnInbound_BaseAction() bool {
	if decoder.Input[0] == 0x0c && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x01 {
		decoder.Input = decoder.Input[3:]
		return true
	}
	return false
}

func (decoder *SessionDecoder) Decode_ReturnInbound_Response() []byte {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		return decoder.decodeBinary()
	}
	return nil
}

func (decoder *SessionDecoder) Skip_ReturnInbound_Response() {
	if decoder.Input[0] == 0x0b && decoder.Input[1] == 0x00 && decoder.Input[2] == 0x02 {
		decoder.skipBinary()
	}
}

func (decoder *SessionDecoder) decodeUInt64() uint64 {
	val := binary.BigEndian.Uint64(decoder.Input[3:])
	decoder.Input = decoder.Input[11:]
	return val
}

func (decoder *SessionDecoder) decodeBinary() []byte {
	length := binary.BigEndian.Uint32(decoder.Input[3:])
	end := 7 + length
	bin := decoder.Input[7:end]
	decoder.Input = decoder.Input[end:]
	return bin
}

func (decoder *SessionDecoder) skipBinary() {
	length := binary.BigEndian.Uint32(decoder.Input[3:])
	end := 7 + length
	decoder.Input = decoder.Input[end:]
}
