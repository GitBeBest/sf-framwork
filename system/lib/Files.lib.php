<?php
class Files
{
 
       //从文件中读取一行或该行的指这长度
        function gets($filename,$length = 1024)
        {
            if (!is_file($filename)) return false;

            $handle = fopen($filename,"rb");
            flock($handle,LOCK_SH);
            $getcontent = fgets($handle,$length);
            fclose($handle);
            return $getcontent;
        }

        //将整个文件读入一个字符串
        function read($filename, $method="rb", $start=null, $lines=null)
        {
            if (!is_file($filename)) return false;

            if ($start == NULL && $lines == NULL && function_exists("file_get_contents"))
            {
                $contents = file_get_contents($filename);
            }
            else {
                if (!($fd = @fopen($filename, $method))) return false;
                flock($fd, LOCK_SH);
                if ($start == NULL && $lines == NULL) {
                    $contents = fread($fd, filesize($filename));
                } else {
                    if ( $start > 1 ) {
                        for ($loop=1; $loop < $start; $loop++) {
                            fgets($fd, 65536);
                        }
                    }
                    if ( $lines == null )
                    {
                        while (!feof($fd)) $contents .= fgets($fd, 65536);
                    } else {
                        for ($loop=0; $loop < $lines; $loop++) {
                            $contents .= fgets($fd, 65536);
                            if (feof($fd)) break;
                        }
                    }
                }
                fclose($fd);
            }
            return $contents;
        }

        //将一个字符串写入文件
        function write($filename,$data,$method="wb")
        {
            //判断目录是否存在
			$_dir = dirname($file);
			if(!is_dir($_dir)) $this->mDir($_dir);
			$handle =  @fopen($filename,$method);
            if (false == $handle)return false;
            flock($handle,LOCK_EX);
            if (!@fwrite($handle,$data))return false;
            fclose($handle);
            return true;
        }

        //文件下载
        function downloadFile($fileName,$newName='')
        {
        	if(empty($newName))
        	$newName = $fileName;
            $str = $this->read($fileName) ;
            if (false === $str) return new sfException(lang::get("File Not Found!"));
			
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Content-Disposition: attachment; filename=".basename($newName));

            echo $str ;
        }

        //建立目录
        function mDir($dirName)
        {
            $dirName = $this->formatPath($dirName);
            $dirNames = explode('/', $dirName);
            $total = count($dirNames) ;
            $temp = '';
            for($i=0; $i<$total; $i++) {
                $temp .= $dirNames[$i].'/';
                if (!is_dir($temp)) {
                    $oldmask = umask(0);
                    mkdir($temp, 0777);
                    umask($oldmask);
                }
            }
        }

        function formatPath($path)
        {
            $path = str_replace("\\","/",$path);
            //if (substr($path,-1) != "/") $path .= "/";
            return $path;
        }

        function getFilePro($path,$showPre=false)
        {
            if (!file_exists($path)) return $this->err->catchErr($this->getSysMsg(1001,$path));

            $pre['name']=basename($path);
            $pre['path']=$path;
            $pre['isDir'] = (is_dir($path)) ? true : false;
            if ($showPre)
            {
                $pre['lastName'] = substr( strrchr( $pre['name'], "." ), 1 );
                if ($pre['isDir'])$pre['type'] = "文件夹" ;
                else {
                    include_once(dirname(__FILE__) . '/mimetypes.inc.php');
                    $mimeTypes = getMimeTypes();
                    $pre['type'] = isset($mimeTypes[strtolower($pre['lastName'])])
                               ? $mimeTypes[strtolower($pre['lastName'])]
                               : $pre['lastName']." 文件";
                }

                $fileSize = ($pre['isDir']) ? "" : filesize($path);
                $permissions = $this->getFilePermissions(fileperms($path));
                $lastModified = date("Y-m-d H:i:s", filemtime($path));
                $pre['size']=$fileSize;
                $pre['formatSize']=$this->formatSize($fileSize);
                $pre['permissions']=$permissions;
                $pre['lastModified']=$lastModified;
            }
            return $pre;
        }

        function getFilePermissions($mode) {
        // determine type
            if ( ($mode & 0xC000) == 0xC000) { // unix domain socket
              $type = 's';
            } elseif ( ($mode & 0x4000) == 0x4000) { // directory
              $type = 'd';
            } elseif ( ($mode & 0xA000) == 0xA000) { // symbolic link
              $type = 'l';
            } elseif ( ($mode & 0x8000) == 0x8000) { // regular file
              $type = '-';
            } elseif ( ($mode & 0x6000) == 0x6000) { //bBlock special file
              $type = 'b';
            } elseif ( ($mode & 0x2000) == 0x2000) { // character special file
              $type = 'c';
            } elseif ( ($mode & 0x1000) == 0x1000) { // named pipe
              $type = 'p';
            } else { // unknown
              $type = '?';
            }

        // determine permissions
            $owner['read']    = ($mode & 00400) ? 'r' : '-';
            $owner['write']   = ($mode & 00200) ? 'w' : '-';
            $owner['execute'] = ($mode & 00100) ? 'x' : '-';
            $group['read']    = ($mode & 00040) ? 'r' : '-';
            $group['write']   = ($mode & 00020) ? 'w' : '-';
            $group['execute'] = ($mode & 00010) ? 'x' : '-';
            $world['read']    = ($mode & 00004) ? 'r' : '-';
            $world['write']   = ($mode & 00002) ? 'w' : '-';
            $world['execute'] = ($mode & 00001) ? 'x' : '-';

        // adjust for SUID, SGID and sticky bit
            if ($mode & 0x800 ) $owner['execute'] = ($owner['execute'] == 'x') ? 's' : 'S';
            if ($mode & 0x400 ) $group['execute'] = ($group['execute'] == 'x') ? 's' : 'S';
            if ($mode & 0x200 ) $world['execute'] = ($world['execute'] == 'x') ? 't' : 'T';

            return $type .
                   $owner['read'] . $owner['write'] . $owner['execute'] .
                   $group['read'] . $group['write'] . $group['execute'] .
                   $world['read'] . $world['write'] . $world['execute'];
        }

        function remove($source) {
            if (!$source) return false;

            if (is_dir($source)&& !is_link($source)){
                if (false==($handle = @opendir($source)))return false;

                if ($source[strlen($source) - 1] != DIRECTORY_SEPARATOR) $source .= DIRECTORY_SEPARATOR;

                while (false !== ($file = @readdir($handle)))
                {
                    if ($file != "." && $file != "..")
                    {
                        if (is_writeable($source . $file)) {
                            $this->remove($source . $file);
                        }
                        else return false;
                    }
                }
                closedir($handle);
                if (is_writeable($source)) rmdir($source);
                else return false;
            }
            else {
                if (is_writeable($source)) unlink($source);
                else return false;
            }
        }

        function formatSize($value)
        {
            if (empty($value))return ;
            if ($value<1024)           $size = $value."字节";
            else if ($value<1024*1024) $size = number_format((double)($value/1024),2)."kb";
            else                       $size = number_format((double)($value/(1024*1024)),2)."mb";

            return $size;
        }
    } //end class
?>