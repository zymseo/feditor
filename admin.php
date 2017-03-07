<?php

	header('Content-type:text/html;charset="utf8"');

	class Editor{
		//上传图片
        public function uploadImages(){
            //接收图片信息
            $imageMessage = $_FILES['file'];
            //验证是否是一张图片
            $typeArry = array('jpg', 'jpeg', 'png', 'gif');
            if(!in_array(substr($imageMessage['type'], (strrpos($imageMessage['type'], '/')+1)), $typeArry)){
                return;
            }
            //判断用于存放图片的文件夹是否存在,如果不存在，则自动创建
            $dirname = './APP/Public/uploads/images/';
            if(is_dir($filename)){
                mkdir($dirname, 0777, 1);
            }
            //判断是否是上传文件
            if(is_uploaded_file($imageMessage['tmp_name'])){
                //将文件移动到本地服务器对应的文件夹下边
                $imagePath = $dirname.$imageMessage['name'];
                if(move_uploaded_file($imageMessage['tmp_name'], iconv('utf-8', 'gb2312', $imagePath))){
                    $response = new StdClass;
                    $response->link = 'http://localhost/blog/APP/Public/uploads/images/'.$imageMessage['name'];
                    echo stripslashes(json_encode($response));
                }
            }
        }
	}