<?php

/**
 * tf 命令行
 *
 * @package    tf
 * @author     meetcd <meetcd@126.com>
 * @version    SVN: $Id: cli.php 148 2008-10-20 17:11:42Z meetcd $
 */

// 至少包含一个参数
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

// 根据用户操作执行
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
 * 在命令行打印使用帮助
 */
function useage()
{
 echo "
 ---------------------------- cms useage -----------------------------------
 tf init-model table modelname  创建并初始化一个数据模型
 ---------------------------------------------------------------------------
 ";
 exit(0);
}

/**
 * 拷贝一个目录到指定目录
 * 
 * @param $source 源目录
 * @param $destination 目的目录
 */
function dirCopy($source, $destination, $check_exists=false, $only_files = false)
{
  $result = true;

  if(!is_dir($source))
  {
    echo "源目录名称错误: ". $source."\n";
    exit(0);
  }

  if(!is_dir($destination))
  {
    echo 'mkdir '.$destination."\n";
    if(!mkdir($destination, 0755))
    {
      echo "无法创建目标目录: ". $destination."\n";
      exit(0);
    }
  }
  else if($check_exists)
  {
    echo "目标目录已存在: ". $destination."\n";
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
          echo sprintf('警告：不能拷贝文件 %s 到 %s'."\n", $src, $dtn);
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
 * 创建目录
 */
function createDir($dir)
{
	echo "创建目录：".$dir."\n";
	if (is_dir($dir))
		return true;
	if(!@mkdir($dir,0755))
	{
		echo "无法创建目标目录: ". $dir."\n";
		exit;
	}
}

/**
 * 拷贝文件
 */
 function copyFiles($s,$d)
 {
	echo sprintf('拷贝文件 %s 到 %s'."\n", $s, $d);
	if(! @copy($s, $d))
    {
        echo sprintf('警告：不能拷贝文件 %s 到 %s'."\n", $s, $d);
        exit;
    }
 }

/**
 * 创建一个数据模型
 * 
 * @param 项目所在目录
 */
function modelInit($root,$table,$modelName)
{
	include_once(dirname(__FILE__)."/init-model.php");
	$tools = new initModel($root,$table,$modelName);
	$tools->generate();
}
