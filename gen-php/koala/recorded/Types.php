<?php
namespace koala\recorded;

/**
 * Autogenerated by Thrift Compiler (0.9.1)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;


class BaseAction {
  static $_TSPEC;

  public $ActionIndex = null;
  public $OccurredAt = null;
  public $ActionType = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'ActionIndex',
          'type' => TType::I64,
          ),
        2 => array(
          'var' => 'OccurredAt',
          'type' => TType::I64,
          ),
        3 => array(
          'var' => 'ActionType',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['ActionIndex'])) {
        $this->ActionIndex = $vals['ActionIndex'];
      }
      if (isset($vals['OccurredAt'])) {
        $this->OccurredAt = $vals['OccurredAt'];
      }
      if (isset($vals['ActionType'])) {
        $this->ActionType = $vals['ActionType'];
      }
    }
  }

  public function getName() {
    return 'BaseAction';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->ActionIndex);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->OccurredAt);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->ActionType);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('BaseAction');
    if ($this->ActionIndex !== null) {
      $xfer += $output->writeFieldBegin('ActionIndex', TType::I64, 1);
      $xfer += $output->writeI64($this->ActionIndex);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->OccurredAt !== null) {
      $xfer += $output->writeFieldBegin('OccurredAt', TType::I64, 2);
      $xfer += $output->writeI64($this->OccurredAt);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ActionType !== null) {
      $xfer += $output->writeFieldBegin('ActionType', TType::STRING, 3);
      $xfer += $output->writeString($this->ActionType);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Peer {
  static $_TSPEC;

  public $IP = null;
  public $Port = null;
  public $Zone = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'IP',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'Port',
          'type' => TType::I64,
          ),
        3 => array(
          'var' => 'Zone',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['IP'])) {
        $this->IP = $vals['IP'];
      }
      if (isset($vals['Port'])) {
        $this->Port = $vals['Port'];
      }
      if (isset($vals['Zone'])) {
        $this->Zone = $vals['Zone'];
      }
    }
  }

  public function getName() {
    return 'Peer';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->IP);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->Port);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Zone);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Peer');
    if ($this->IP !== null) {
      $xfer += $output->writeFieldBegin('IP', TType::STRING, 1);
      $xfer += $output->writeString($this->IP);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Port !== null) {
      $xfer += $output->writeFieldBegin('Port', TType::I64, 2);
      $xfer += $output->writeI64($this->Port);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Zone !== null) {
      $xfer += $output->writeFieldBegin('Zone', TType::STRING, 3);
      $xfer += $output->writeString($this->Zone);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class CallFromInbound {
  static $_TSPEC;

  public $Base = null;
  public $Peer = null;
  public $Request = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'Peer',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\Peer',
          ),
        3 => array(
          'var' => 'Request',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['Peer'])) {
        $this->Peer = $vals['Peer'];
      }
      if (isset($vals['Request'])) {
        $this->Request = $vals['Request'];
      }
    }
  }

  public function getName() {
    return 'CallFromInbound';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->Peer = new \koala\recorded\Peer();
            $xfer += $this->Peer->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Request);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('CallFromInbound');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Peer !== null) {
      if (!is_object($this->Peer)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Peer', TType::STRUCT, 2);
      $xfer += $this->Peer->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Request !== null) {
      $xfer += $output->writeFieldBegin('Request', TType::STRING, 3);
      $xfer += $output->writeString($this->Request);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ReturnInbound {
  static $_TSPEC;

  public $Base = null;
  public $Response = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'Response',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['Response'])) {
        $this->Response = $vals['Response'];
      }
    }
  }

  public function getName() {
    return 'ReturnInbound';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Response);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ReturnInbound');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Response !== null) {
      $xfer += $output->writeFieldBegin('Response', TType::STRING, 2);
      $xfer += $output->writeString($this->Response);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class CallOutbound {
  static $_TSPEC;

  public $Base = null;
  public $SocketFD = null;
  public $Peer = null;
  public $Request = null;
  public $ResponseTime = null;
  public $Response = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'SocketFD',
          'type' => TType::I64,
          ),
        3 => array(
          'var' => 'Peer',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\Peer',
          ),
        4 => array(
          'var' => 'Request',
          'type' => TType::STRING,
          ),
        5 => array(
          'var' => 'ResponseTime',
          'type' => TType::I64,
          ),
        6 => array(
          'var' => 'Response',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['SocketFD'])) {
        $this->SocketFD = $vals['SocketFD'];
      }
      if (isset($vals['Peer'])) {
        $this->Peer = $vals['Peer'];
      }
      if (isset($vals['Request'])) {
        $this->Request = $vals['Request'];
      }
      if (isset($vals['ResponseTime'])) {
        $this->ResponseTime = $vals['ResponseTime'];
      }
      if (isset($vals['Response'])) {
        $this->Response = $vals['Response'];
      }
    }
  }

  public function getName() {
    return 'CallOutbound';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->SocketFD);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->Peer = new \koala\recorded\Peer();
            $xfer += $this->Peer->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Request);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::I64) {
            $xfer += $input->readI64($this->ResponseTime);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Response);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('CallOutbound');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->SocketFD !== null) {
      $xfer += $output->writeFieldBegin('SocketFD', TType::I64, 2);
      $xfer += $output->writeI64($this->SocketFD);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Peer !== null) {
      if (!is_object($this->Peer)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Peer', TType::STRUCT, 3);
      $xfer += $this->Peer->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Request !== null) {
      $xfer += $output->writeFieldBegin('Request', TType::STRING, 4);
      $xfer += $output->writeString($this->Request);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ResponseTime !== null) {
      $xfer += $output->writeFieldBegin('ResponseTime', TType::I64, 5);
      $xfer += $output->writeI64($this->ResponseTime);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Response !== null) {
      $xfer += $output->writeFieldBegin('Response', TType::STRING, 6);
      $xfer += $output->writeString($this->Response);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class AppendFile {
  static $_TSPEC;

  public $Base = null;
  public $FileName = null;
  public $Content = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'FileName',
          'type' => TType::STRING,
          ),
        3 => array(
          'var' => 'Content',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['FileName'])) {
        $this->FileName = $vals['FileName'];
      }
      if (isset($vals['Content'])) {
        $this->Content = $vals['Content'];
      }
    }
  }

  public function getName() {
    return 'AppendFile';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->FileName);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('AppendFile');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->FileName !== null) {
      $xfer += $output->writeFieldBegin('FileName', TType::STRING, 2);
      $xfer += $output->writeString($this->FileName);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Content !== null) {
      $xfer += $output->writeFieldBegin('Content', TType::STRING, 3);
      $xfer += $output->writeString($this->Content);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class SendUDP {
  static $_TSPEC;

  public $Base = null;
  public $Peer = null;
  public $Content = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'Peer',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\Peer',
          ),
        3 => array(
          'var' => 'Content',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['Peer'])) {
        $this->Peer = $vals['Peer'];
      }
      if (isset($vals['Content'])) {
        $this->Content = $vals['Content'];
      }
    }
  }

  public function getName() {
    return 'SendUDP';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->Peer = new \koala\recorded\Peer();
            $xfer += $this->Peer->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('SendUDP');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Peer !== null) {
      if (!is_object($this->Peer)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Peer', TType::STRUCT, 2);
      $xfer += $this->Peer->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Content !== null) {
      $xfer += $output->writeFieldBegin('Content', TType::STRING, 3);
      $xfer += $output->writeString($this->Content);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class ReadStorage {
  static $_TSPEC;

  public $Base = null;
  public $Content = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'Base',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\BaseAction',
          ),
        2 => array(
          'var' => 'Content',
          'type' => TType::STRING,
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['Base'])) {
        $this->Base = $vals['Base'];
      }
      if (isset($vals['Content'])) {
        $this->Content = $vals['Content'];
      }
    }
  }

  public function getName() {
    return 'ReadStorage';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->Base = new \koala\recorded\BaseAction();
            $xfer += $this->Base->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->Content);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('ReadStorage');
    if ($this->Base !== null) {
      if (!is_object($this->Base)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Base', TType::STRUCT, 1);
      $xfer += $this->Base->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Content !== null) {
      $xfer += $output->writeFieldBegin('Content', TType::STRING, 2);
      $xfer += $output->writeString($this->Content);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Action {
  static $_TSPEC;

  public $CallFromInbound = null;
  public $ReturnInBound = null;
  public $CallOutbound = null;
  public $AppendFile = null;
  public $SendUDP = null;
  public $ReadStorage = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'CallFromInbound',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\CallFromInbound',
          ),
        2 => array(
          'var' => 'ReturnInBound',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\ReturnInbound',
          ),
        3 => array(
          'var' => 'CallOutbound',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\CallOutbound',
          ),
        4 => array(
          'var' => 'AppendFile',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\AppendFile',
          ),
        5 => array(
          'var' => 'SendUDP',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\SendUDP',
          ),
        6 => array(
          'var' => 'ReadStorage',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\ReadStorage',
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['CallFromInbound'])) {
        $this->CallFromInbound = $vals['CallFromInbound'];
      }
      if (isset($vals['ReturnInBound'])) {
        $this->ReturnInBound = $vals['ReturnInBound'];
      }
      if (isset($vals['CallOutbound'])) {
        $this->CallOutbound = $vals['CallOutbound'];
      }
      if (isset($vals['AppendFile'])) {
        $this->AppendFile = $vals['AppendFile'];
      }
      if (isset($vals['SendUDP'])) {
        $this->SendUDP = $vals['SendUDP'];
      }
      if (isset($vals['ReadStorage'])) {
        $this->ReadStorage = $vals['ReadStorage'];
      }
    }
  }

  public function getName() {
    return 'Action';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRUCT) {
            $this->CallFromInbound = new \koala\recorded\CallFromInbound();
            $xfer += $this->CallFromInbound->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->ReturnInBound = new \koala\recorded\ReturnInbound();
            $xfer += $this->ReturnInBound->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->CallOutbound = new \koala\recorded\CallOutbound();
            $xfer += $this->CallOutbound->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::STRUCT) {
            $this->AppendFile = new \koala\recorded\AppendFile();
            $xfer += $this->AppendFile->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 5:
          if ($ftype == TType::STRUCT) {
            $this->SendUDP = new \koala\recorded\SendUDP();
            $xfer += $this->SendUDP->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 6:
          if ($ftype == TType::STRUCT) {
            $this->ReadStorage = new \koala\recorded\ReadStorage();
            $xfer += $this->ReadStorage->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Action');
    if ($this->CallFromInbound !== null) {
      if (!is_object($this->CallFromInbound)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('CallFromInbound', TType::STRUCT, 1);
      $xfer += $this->CallFromInbound->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ReturnInBound !== null) {
      if (!is_object($this->ReturnInBound)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('ReturnInBound', TType::STRUCT, 2);
      $xfer += $this->ReturnInBound->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->CallOutbound !== null) {
      if (!is_object($this->CallOutbound)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('CallOutbound', TType::STRUCT, 3);
      $xfer += $this->CallOutbound->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->AppendFile !== null) {
      if (!is_object($this->AppendFile)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('AppendFile', TType::STRUCT, 4);
      $xfer += $this->AppendFile->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->SendUDP !== null) {
      if (!is_object($this->SendUDP)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('SendUDP', TType::STRUCT, 5);
      $xfer += $this->SendUDP->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ReadStorage !== null) {
      if (!is_object($this->ReadStorage)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('ReadStorage', TType::STRUCT, 6);
      $xfer += $this->ReadStorage->write($output);
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}

class Session {
  static $_TSPEC;

  public $SessionId = null;
  public $CallFromInbound = null;
  public $ReturnInbound = null;
  public $Actions = null;

  public function __construct($vals=null) {
    if (!isset(self::$_TSPEC)) {
      self::$_TSPEC = array(
        1 => array(
          'var' => 'SessionId',
          'type' => TType::STRING,
          ),
        2 => array(
          'var' => 'CallFromInbound',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\CallFromInbound',
          ),
        3 => array(
          'var' => 'ReturnInbound',
          'type' => TType::STRUCT,
          'class' => '\koala\recorded\ReturnInbound',
          ),
        4 => array(
          'var' => 'Actions',
          'type' => TType::LST,
          'etype' => TType::STRUCT,
          'elem' => array(
            'type' => TType::STRUCT,
            'class' => '\koala\recorded\Action',
            ),
          ),
        );
    }
    if (is_array($vals)) {
      if (isset($vals['SessionId'])) {
        $this->SessionId = $vals['SessionId'];
      }
      if (isset($vals['CallFromInbound'])) {
        $this->CallFromInbound = $vals['CallFromInbound'];
      }
      if (isset($vals['ReturnInbound'])) {
        $this->ReturnInbound = $vals['ReturnInbound'];
      }
      if (isset($vals['Actions'])) {
        $this->Actions = $vals['Actions'];
      }
    }
  }

  public function getName() {
    return 'Session';
  }

  public function read($input)
  {
    $xfer = 0;
    $fname = null;
    $ftype = 0;
    $fid = 0;
    $xfer += $input->readStructBegin($fname);
    while (true)
    {
      $xfer += $input->readFieldBegin($fname, $ftype, $fid);
      if ($ftype == TType::STOP) {
        break;
      }
      switch ($fid)
      {
        case 1:
          if ($ftype == TType::STRING) {
            $xfer += $input->readString($this->SessionId);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 2:
          if ($ftype == TType::STRUCT) {
            $this->CallFromInbound = new \koala\recorded\CallFromInbound();
            $xfer += $this->CallFromInbound->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 3:
          if ($ftype == TType::STRUCT) {
            $this->ReturnInbound = new \koala\recorded\ReturnInbound();
            $xfer += $this->ReturnInbound->read($input);
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        case 4:
          if ($ftype == TType::LST) {
            $this->Actions = array();
            $_size0 = 0;
            $_etype3 = 0;
            $xfer += $input->readListBegin($_etype3, $_size0);
            for ($_i4 = 0; $_i4 < $_size0; ++$_i4)
            {
              $elem5 = null;
              $elem5 = new \koala\recorded\Action();
              $xfer += $elem5->read($input);
              $this->Actions []= $elem5;
            }
            $xfer += $input->readListEnd();
          } else {
            $xfer += $input->skip($ftype);
          }
          break;
        default:
          $xfer += $input->skip($ftype);
          break;
      }
      $xfer += $input->readFieldEnd();
    }
    $xfer += $input->readStructEnd();
    return $xfer;
  }

  public function write($output) {
    $xfer = 0;
    $xfer += $output->writeStructBegin('Session');
    if ($this->SessionId !== null) {
      $xfer += $output->writeFieldBegin('SessionId', TType::STRING, 1);
      $xfer += $output->writeString($this->SessionId);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->CallFromInbound !== null) {
      if (!is_object($this->CallFromInbound)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('CallFromInbound', TType::STRUCT, 2);
      $xfer += $this->CallFromInbound->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->ReturnInbound !== null) {
      if (!is_object($this->ReturnInbound)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('ReturnInbound', TType::STRUCT, 3);
      $xfer += $this->ReturnInbound->write($output);
      $xfer += $output->writeFieldEnd();
    }
    if ($this->Actions !== null) {
      if (!is_array($this->Actions)) {
        throw new TProtocolException('Bad type in structure.', TProtocolException::INVALID_DATA);
      }
      $xfer += $output->writeFieldBegin('Actions', TType::LST, 4);
      {
        $output->writeListBegin(TType::STRUCT, count($this->Actions));
        {
          foreach ($this->Actions as $iter6)
          {
            $xfer += $iter6->write($output);
          }
        }
        $output->writeListEnd();
      }
      $xfer += $output->writeFieldEnd();
    }
    $xfer += $output->writeFieldStop();
    $xfer += $output->writeStructEnd();
    return $xfer;
  }

}


