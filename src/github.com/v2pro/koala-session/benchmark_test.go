package koala_session

import (
	"testing"
	"git.apache.org/thrift.git/lib/go/thrift"
	"bytes"
	"encoding/hex"
	"github.com/v2pro/koala/recording"
	"net"
)

func Benchmark_original_decoder(b *testing.B) {
	input, err := hex.DecodeString("0b00010000000a73657373696f6e2d69640c00020c00010a000100000000000000010a000200000000000000000b00030000000f43616c6c46726f6d496e626f756e64000c00020b0001000000093132372e302e302e310a000200000000000004d2000b00030000000568656c6c6f000c00030c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000f00040c000000010c00020c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000000")
	if err != nil {
		b.Error(err)
		return
	}
	buf := &memoryBuffer{}
	proto := thrift.NewTBinaryProtocol(buf, true, true)
	session := &Session{}
	for i := 0; i < b.N; i++ {
		buf.Buffer = bytes.NewBuffer(input)
		err := session.Read(proto)
		if err != nil {
			b.Error(err)
			return
		}
	}
}

func Benchmark_faster_decoder(b *testing.B) {
	input, err := hex.DecodeString(
		"0b00010000000a73657373696f6e2d6964" +
			"0c0002" /* CallFromInbound */ +
			"0c0001" /* BaseAction */ +
			"0a00010000000000000001" /* ActionIndex */ +
			"0a00020000000000000000" /* OccurredAt */ +
			"0b00030000000f43616c6c46726f6d496e626f756e64" + /* ActionType */ "00" +
			"0c0002" /* Peer */ +
			"0b0001000000093132372e302e302e31" /* IP */ +
			"0a000200000000000004d2" /* Port */ + "00" +
			"0b00030000000568656c6c6f" /* Request */ + "00" +
			"0c0003" /* ReturnInbound */ +
			"0c0001" /* BaseAction */ +
			"0a00010000000000000002" /* ActionIndex */ +
			"0a00020000000000000000" /* OccurredAt */ +
			"0b00030000000d52657475726e496e626f756e64" /* ActionType */ + "00" +
			"0b000200000005776f726c64" /* Response */ + "00" +
			"0f00040c00000001" /* Actions */ +
			"0c0002" /* ReturnInBound */ +
			"0c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000000")
	if err != nil {
		b.Error(err)
		return
	}
	decoder := &SessionDecoder{}
	for i := 0; i < b.N; i++ {
		decoder.Input = input
		decoder.SkipSession()
		if decoder.Error != nil {
			b.Error(decoder.Error)
			return
		}
	}
}

func Benchmark_original_encoder(b *testing.B) {
	input, err := hex.DecodeString("0b00010000000a73657373696f6e2d69640c00020c00010a000100000000000000010a000200000000000000000b00030000000f43616c6c46726f6d496e626f756e64000c00020b0001000000093132372e302e302e310a000200000000000004d2000b00030000000568656c6c6f000c00030c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000f00040c000000010c00020c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000000")
	if err != nil {
		b.Error(err)
		return
	}
	buf := &memoryBuffer{}
	proto := thrift.NewTBinaryProtocol(buf, true, true)
	session1 := &Session{}
	buf.Buffer = bytes.NewBuffer(input)
	err = session1.Read(proto)
	if err != nil {
		b.Error(err)
		return
	}
	b.ResetTimer()
	b.ReportAllocs()
	for i := 0; i < b.N; i++ {
		buf.Buffer.Reset()
		session1.Write(proto)
	}
}

func Benchmark_fast_encoder(b *testing.B) {
	input, err := hex.DecodeString("0b00010000000a73657373696f6e2d69640c00020c00010a000100000000000000010a000200000000000000000b00030000000f43616c6c46726f6d496e626f756e64000c00020b0001000000093132372e302e302e310a000200000000000004d2000b00030000000568656c6c6f000c00030c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000f00040c000000010c00020c00010a000100000000000000020a000200000000000000000b00030000000d52657475726e496e626f756e64000b000200000005776f726c64000000")
	if err != nil {
		b.Error(err)
		return
	}
	buf := &memoryBuffer{}
	proto := thrift.NewTBinaryProtocol(buf, true, true)
	session1 := &Session{}
	buf.Buffer = bytes.NewBuffer(input)
	err = session1.Read(proto)
	if err != nil {
		b.Error(err)
		return
	}
	session2 := &recording.Session{}
	session2.SessionId = session1.SessionId
	session2.CallFromInbound = &recording.CallFromInbound{
		BaseAction: recording.BaseAction{
			ActionIndex: int(session1.CallFromInbound.Base.ActionIndex),
			OccurredAt:  session1.CallFromInbound.Base.OccurredAt,
			ActionType:  session1.CallFromInbound.Base.ActionType,
		},
		Peer: net.TCPAddr{
			IP:   net.ParseIP(session1.CallFromInbound.Peer.IP),
			Port: int(session1.CallFromInbound.Peer.Port),
			Zone: session1.CallFromInbound.Peer.Zone,
		},
		Request: session1.CallFromInbound.Request,
	}
	session2.ReturnInbound = &recording.ReturnInbound{
		BaseAction: recording.BaseAction{
			ActionIndex: int(session1.ReturnInbound.Base.ActionIndex),
			OccurredAt:  session1.ReturnInbound.Base.OccurredAt,
			ActionType:  session1.ReturnInbound.Base.ActionType,
		},
		Response: session1.ReturnInbound.Response,
	}
	session2.Actions = []recording.Action{
		session2.ReturnInbound,
	}
	encoder := &SessionEncoder{}
	b.ResetTimer()
	b.ReportAllocs()
	for i := 0; i < b.N; i++ {
		encoder.Output = encoder.Output[:]
		encoder.Encode(session2)
	}
}

type memoryBuffer struct {
	*bytes.Buffer
}

func (p *memoryBuffer) IsOpen() bool {
	return true
}

func (p *memoryBuffer) Open() error {
	return nil
}

func (p *memoryBuffer) Peek() bool {
	return p.IsOpen()
}

func (p *memoryBuffer) Close() error {
	p.Buffer.Reset()
	return nil
}

// Flushing a memory buffer is a no-op
func (p *memoryBuffer) Flush() error {
	return nil
}
