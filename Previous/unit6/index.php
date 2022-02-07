<html>
<head>
    <title>Форма завантаження файла</title>
    <meta charset="UTF-8">
    </head>
<body>

    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
        Завантажити файл: <br><br>
        <input name="filename" type="file" ><br><br>
        <input type="submit" value="Завантажити" ><br><br>
    </form>

    <?php

        //$upload_dir = "C:/Users/mykhailo.pivkach/Documents/NetBeansProjects/unit6_upload/upload";
        $upload_dir = "upload";
        if (isset($_FILES['filename'])) {
            $filename = $_FILES['filename']['name'];
            $tmp_filename = $_FILES['filename']['tmp_name'];
            move_uploaded_file($tmp_filename, "$upload_dir/$filename");
        }

        //var_dump($upload_files);

        $upload_files = scandir($upload_dir);

        foreach ($upload_files as $filename) {
            if($filename !== "." && $filename !== ".." && getimagesize("$upload_dir/$filename") > 0) {
                echo '<img src="' . "$upload_dir/$filename" . '">';
               // echo date('r',filectime("$upload_dir/$filename"));
            }

        }

        $backup_dir = "C:/OpenServer//domains/localhost/unit6/backup";

        /*  ------Task №1------  */
        class BackupController {
            public $secondsInDay = 86400;
            public function makeBackup($upload_files, $upload_dir, $backup_dir) {
                if(!file_exists("backup")) {
                    mkdir("backup");
                }
                foreach($upload_files as $filename) {
                    if($filename != "." && $filename != ".." && filectime("$upload_dir/$filename") > 3 * $secondsInDay) {
                        copy("$upload_dir/$filename", "$backup_dir/$filename");
                    }
                }
            }
        }



        /*  ------Task №2------  */
        class TestController {
            public function deleteTest($upload_files, $upload_dir) {
                foreach($upload_files  as $filename) {
                    $pathExtension = pathinfo($filename)['extension'];
                    if($pathExtension === "txt") {
                        $content = file_get_contents("$upload_dir/$filename");
                        if((mb_strpos($content, " тест ")) !== false ) {
                            unlink("$upload_dir/$filename");
                        }
                    }
                }
            }
        }



        /*  ------Task №3------  */
        //$files = scandir($upload_dir);
        //$sourceFile = array_search("source.txt", $files);
        class ReverseController {
            public function mb_strrev($str) {
                $r = '';
                for ($i = mb_strlen($str); $i >= 0; $i--) {
                    $r .= mb_substr($str, $i, 1);
                }
                return $r;
            }
            public function reverseFile($upload_dir) {
                if(file_exists("$upload_dir/source.txt")) {
                    $content = file_get_contents("$upload_dir/source.txt");
                    $reversedContent = self::mb_strrev($content);
                    file_put_contents("$upload_dir/dest.txt", $reversedContent);
                }
            }

        }

        $backup = new BackupController();
        $test = new testController();
        $reverse = new ReverseController();

        $backup->makeBackup($upload_files, $upload_dir, $backup_dir);
        $test->deleteTest($upload_files, $upload_dir);
        $reverse->reverseFile($upload_dir);



    ?>



</body>
</html>
