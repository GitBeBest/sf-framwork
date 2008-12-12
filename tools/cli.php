<?php

/**
 * tf ������
 *
 * @package    tf
 * @author     meetcd <meetcd@126.com>
 * @version    SVN: $Id: cli.php 148 2008-10-20 17:11:42Z meetcd $
 */

// ���ٰ���һ������
if ($argc < 2) { useage(); }
$argv = array_map('trim', $argv);

if(!defined('ROOT_DIR'))
{
  define('ROOT_DIR', realpath(dirname(__FILE__).'/../'));
}
if (!function_exists('file_put_contents'))
{
  include(ROOT_DIR.'/tools/file_put_contents.php');
}

// �����û�����ִ��
switch(trim($argv[1]))
{
  case '-V':
  case '--version':

    echo "tf tools\n";
    echo "copyright (c) 2008\n";
    break;

  case 'init-model':
  	modelInit(getcwd(),$argv[2],$argv[3]);
  break;
  default:
    useage();
}

exit(0);

/**
 * �������д�ӡʹ�ð���
 */
function useage()
{
 echo "
 ---------------------------- cms useage -----------------------------------
 tf init-model table modelname  ��������ʼ��һ������ģ��
 ---------------------------------------------------------------------------
 ";
 exit(0);
}

/**
 * ����һ��Ŀ¼��ָ��Ŀ¼
 * 
 * @param $source ԴĿ¼
 * @param $destination Ŀ��Ŀ¼
 */
function dirCopy($source, $destination, $check_exists=false, $only_files = false)
{
  $result = true;

  if(!is_dir($source))
  {
    echo "ԴĿ¼���ƴ���: ". $source."\n";
    exit(0);
  }

  if(!is_dir($destination))
  {
    echo 'mkdir '.$destination."\n";
    if(!mkdir($destination, 0755))
    {
      echo "�޷�����Ŀ��Ŀ¼: ". $destination."\n";
      exit(0);
    }
  }
  else if($check_exists)
  {
    echo "Ŀ��Ŀ¼�Ѵ���: ". $destination."\n";
    exit(0);
  }

  $handle = opendir($source);
  while(false !== ($file = readdir($handle)))
  {
    if($file != '.' && $file != '..' && strtolower($file) != '.svn')
    {
      $src = $source . "/" . $file;
      $dtn = $destination . "/" . $file;
      if(is_dir($src))
      {
        if ($only_files)
			continue;
		dirCopy($src, $dtn);
      }
      else
      {
        echo 'copy '.$dtn."\n";
        if(! copy($src, $dtn))
        {
          echo sprintf('���棺���ܿ����ļ� %s �� %s'."\n", $src, $dtn);
          $result = false;
          break;
        }
      }
    }
  }
  closedir($handle);

  return $result;
}

/**
 * ����Ŀ¼
 */
function createDir($dir)
{
	echo "����Ŀ¼��".$dir."\n";
	if (is_dir($dir))
		return true;
	if(!@mkdir($dir,0755))
	{
		echo "�޷�����Ŀ��Ŀ¼: ". $dir."\n";
		exit;
	}
}

/**
 * �����ļ�
 */
 function copyFiles($s,$d)
 {
	echo sprintf('�����ļ� %s �� %s'."\n", $s, $d);
	if(! @copy($s, $d))
    {
        echo sprintf('���棺���ܿ����ļ� %s �� %s'."\n", $s, $d);
        exit;
    }
 }

/**
 * ����һ������ģ��
 * 
 * @param ��Ŀ����Ŀ¼
 */
function modelInit($root,$table,$modelName)
{
	include_once(dirname(__FILE__)."/init-model.php");
	$tools = new initModel($root,$table,$modelName);
	$tools->generate();
}
