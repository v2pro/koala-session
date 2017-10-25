namespace php koala.recorded
namespace go koala.recoreded

struct BaseAction {
    1: i64 ActionIndex
    2: i64 OccurredAt
    3: string ActionType
}

struct Peer {
    1: binary IP
    2: i64 Port
    3: string Zone
}

struct CallFromInbound {
    1: BaseAction Base
    2: Peer Peer
    3: binary Request
}

struct ReturnInbound {
    1: BaseAction Base
    2: binary Response
}

struct CallOutbound {
    1: BaseAction Base
    2: i64 SocketFD
    3: Peer Peer
    4: binary Request
    5: i64 ResponseTime
    6: binary Response
}

struct AppendFile {
    1: BaseAction Base
    2: string FileName
    3: binary Content
}

struct SendUDP {
    1: BaseAction Base
    2: Peer Peer
    3: binary Content
}

struct ReadStorage {
    1: BaseAction Base
    2: binary Content
}

union Action {
    1: CallFromInbound CallFromInbound
    2: ReturnInbound ReturnInBound
    3: CallOutbound CallOutbound
    4: AppendFile AppendFile
    5: SendUDP SendUDP
    6: ReadStorage ReadStorage
}

struct Session {
    1: string SessionId
    2: CallFromInbound CallFromInbound
    3: ReturnInbound ReturnInbound
    4: list<Action> Actions
}
