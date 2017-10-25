package koala_session

// Type constants in the Thrift protocol
type ThriftType byte

const (
	ThriftStop   ThriftType = 0
	ThriftVoid   ThriftType = 1
	ThriftBool   ThriftType = 2
	ThriftByte   ThriftType = 3
	ThriftI08    ThriftType = 3
	ThriftDouble ThriftType = 4
	ThriftI16    ThriftType = 6
	ThriftI32    ThriftType = 8
	ThriftI64    ThriftType = 10
	ThriftString ThriftType = 11
	ThriftUTF7   ThriftType = 11
	ThriftStruct ThriftType = 12
	ThriftMap    ThriftType = 13
	ThriftSet    ThriftType = 14
	ThriftList   ThriftType = 15
	ThriftUTF8   ThriftType = 16
	ThriftUTF16  ThriftType = 17
)

var typeNames = map[ThriftType]string{
	ThriftStop:   "STOP",
	ThriftVoid:   "VOID",
	ThriftBool:   "BOOL",
	ThriftByte:   "BYTE",
	ThriftI16:    "I16",
	ThriftI32:    "I32",
	ThriftI64:    "I64",
	ThriftString: "STRING",
	ThriftStruct: "STRUCT",
	ThriftMap:    "MAP",
	ThriftSet:    "SET",
	ThriftList:   "LIST",
	ThriftUTF8:   "UTF8",
	ThriftUTF16:  "UTF16",
}

func (p ThriftType) String() string {
	if s, ok := typeNames[p]; ok {
		return s
	}
	return "Unknown"
}
