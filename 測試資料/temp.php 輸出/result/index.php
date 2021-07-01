<?php include 'php000.php'; ?>
        <div class="path">
            <form action="" method="post" style="margin:10px;text-align:center">
                <input type="text" name="fm_usr" value="" placeholder="<?php include 'php001.php'; ?>" required>
                <input type="password" name="fm_pwd" value="" placeholder="<?php include 'php002.php'; ?>" required>
                <select name="lang" title="Language">
                    <?php include 'php003.php'; ?>
                        <option value="<?php include 'php004.php'; ?>"<?php include 'php005.php'; ?>><?php include 'php006.php'; ?></option>
                    <?php include 'php007.php'; ?>
                </select>
                <input type="submit" value="<?php include 'php008.php'; ?>">
            </form>
        </div>
        <?php include 'php009.php'; ?>
    <div class="path">
        <p><b><?php include 'php010.php'; ?></b></p>
        <p class="break-word"><?php include 'php011.php'; ?> <?php include 'php012.php'; ?></p>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="p" value="<?php include 'php013.php'; ?>">
            <input type="hidden" name="upl" value="1">
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <input type="file" name="upload[]"><br>
            <br>
            <p>
                <button type="submit" class="btn"><i class="icon-apply"></i> <?php include 'php014.php'; ?></button> &nbsp;
                <b><a href="?p=<?php include 'php015.php'; ?>"><i class="icon-cancel"></i> <?php include 'php016.php'; ?></a></b>
            </p>
        </form>
    </div>
    <?php include 'php017.php'; ?>
    <div class="path">
        <p><b><?php include 'php018.php'; ?></b></p>
        <form action="" method="post">
            <input type="hidden" name="p" value="<?php include 'php019.php'; ?>">
            <input type="hidden" name="finish" value="1">
            <?php include 'php020.php'; ?>
            <p class="break-word"><?php include 'php021.php'; ?> <b><?php include 'php022.php'; ?></b></p>
            <p class="break-word"><?php include 'php023.php'; ?> <?php include 'php024.php'; ?><br>
                <label for="inp_copy_to"><?php include 'php025.php'; ?></label>
                <?php include 'php026.php'; ?>/<input type="text" name="copy_to" id="inp_copy_to" value="<?php include 'php027.php'; ?>">
            </p>
            <p><label><input type="checkbox" name="move" value="1"> <?php include 'php028.php'; ?></label></p>
            <p>
                <button type="submit" class="btn"><i class="icon-apply"></i> <?php include 'php029.php'; ?></button> &nbsp;
                <b><a href="?p=<?php include 'php030.php'; ?>"><i class="icon-cancel"></i> <?php include 'php031.php'; ?></a></b>
            </p>
        </form>
    </div>
    <?php include 'php032.php'; ?>
    <div class="path">
        <p><b><?php include 'php033.php'; ?></b></p>
        <p class="break-word">
            <?php include 'php034.php'; ?> <?php include 'php035.php'; ?><br>
            <?php include 'php036.php'; ?> <?php include 'php037.php'; ?>
        </p>
        <p>
            <b><a href="?p=<?php include 'php038.php'; ?>&amp;copy=<?php include 'php039.php'; ?>&amp;finish=1"><i class="icon-apply"></i> <?php include 'php040.php'; ?></a></b> &nbsp;
            <b><a href="?p=<?php include 'php041.php'; ?>&amp;copy=<?php include 'php042.php'; ?>&amp;finish=1&amp;move=1"><i class="icon-apply"></i> <?php include 'php043.php'; ?></a></b> &nbsp;
            <b><a href="?p=<?php include 'php044.php'; ?>"><i class="icon-cancel"></i> <?php include 'php045.php'; ?></a></b>
        </p>
        <p><i><?php include 'php046.php'; ?></i></p>
        <ul class="folders break-word">
            <?php include 'php047.php'; ?>
                <li><a href="?p=<?php include 'php048.php'; ?>&amp;copy=<?php include 'php049.php'; ?>"><i class="icon-arrow_up"></i> ..</a></li>
            <?php include 'php050.php'; ?>
                <li><a href="?p=<?php include 'php051.php'; ?>&amp;copy=<?php include 'php052.php'; ?>"><i class="icon-folder"></i> <?php include 'php053.php'; ?></a></li>
            <?php include 'php054.php'; ?>
        </ul>
    </div>
    <?php include 'php055.php'; ?>
    <div class="path">
        <p class="break-word"><b><?php include 'php056.php'; ?> <?php include 'php057.php'; ?></b></p>
        <p class="break-word">
            <?php include 'php058.php'; ?> <?php include 'php059.php'; ?><br>
            <?php include 'php060.php'; ?> <?php include 'php061.php'; ?> (<?php include 'php062.php'; ?>)<br>
            <?php include 'php063.php'; ?> <?php include 'php064.php'; ?><br>
            <?php include 'php065.php'; ?>
                <?php include 'php066.php'; ?> <?php include 'php067.php'; ?><br>
                <?php include 'php068.php'; ?> <?php include 'php069.php'; ?><br>
                <?php include 'php070.php'; ?> <?php include 'php071.php'; ?><br>
                <?php include 'php072.php'; ?> <?php include 'php073.php'; ?>%<br>
                <?php include 'php074.php'; ?>
        </p>
        <p>
            <b><a href="?p=<?php include 'php075.php'; ?>&amp;dl=<?php include 'php076.php'; ?>"><i class="icon-download"></i> <?php include 'php077.php'; ?></a></b> &nbsp;
            <b><a href="<?php include 'php078.php'; ?>" target="_blank"><i class="icon-chain"></i> <?php include 'php079.php'; ?></a></b> &nbsp;
            <?php include 'php080.php'; ?>
                <b><a href="?p=<?php include 'php081.php'; ?>&amp;unzip=<?php include 'php082.php'; ?>"><i class="icon-apply"></i> <?php include 'php083.php'; ?></a></b> &nbsp;
                <b><a href="?p=<?php include 'php084.php'; ?>&amp;unzip=<?php include 'php085.php'; ?>&amp;tofolder=1" title="<?php include 'php086.php'; ?> <?php include 'php087.php'; ?>"><i class="icon-apply"></i>
                    <?php include 'php088.php'; ?></a></b> &nbsp;
                <?php include 'php089.php'; ?>
            <b><a href="?p=<?php include 'php090.php'; ?>"><i class="icon-goback"></i> <?php include 'php091.php'; ?></a></b>
        </p>
        <?php include 'php092.php'; ?>
    </div>
    <?php include 'php093.php'; ?>
    <div class="path">
        <p><b><?php include 'php094.php'; ?></b></p>
        <p>
            <?php include 'php095.php'; ?> <?php include 'php096.php'; ?><br>
        </p>
        <form action="" method="post">
            <input type="hidden" name="p" value="<?php include 'php097.php'; ?>">
            <input type="hidden" name="chmod" value="<?php include 'php098.php'; ?>">

            <table class="compact-table">
                <tr>
                    <td></td>
                    <td><b><?php include 'php099.php'; ?></b></td>
                    <td><b><?php include 'php100.php'; ?></b></td>
                    <td><b><?php include 'php101.php'; ?></b></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b><?php include 'php102.php'; ?></b></td>
                    <td><label><input type="checkbox" name="ur" value="1"<?php include 'php103.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="gr" value="1"<?php include 'php104.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="or" value="1"<?php include 'php105.php'; ?>></label></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b><?php include 'php106.php'; ?></b></td>
                    <td><label><input type="checkbox" name="uw" value="1"<?php include 'php107.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="gw" value="1"<?php include 'php108.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="ow" value="1"<?php include 'php109.php'; ?>></label></td>
                </tr>
                <tr>
                    <td style="text-align: right"><b><?php include 'php110.php'; ?></b></td>
                    <td><label><input type="checkbox" name="ux" value="1"<?php include 'php111.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="gx" value="1"<?php include 'php112.php'; ?>></label></td>
                    <td><label><input type="checkbox" name="ox" value="1"<?php include 'php113.php'; ?>></label></td>
                </tr>
            </table>

            <p>
                <button type="submit" class="btn"><i class="icon-apply"></i> <?php include 'php114.php'; ?></button> &nbsp;
                <b><a href="?p=<?php include 'php115.php'; ?>"><i class="icon-cancel"></i> <?php include 'php116.php'; ?></a></b>
            </p>

        </form>

    </div>
    <?php include 'php117.php'; ?>
<form action="" method="post">
<input type="hidden" name="p" value="<?php include 'php118.php'; ?>">
<input type="hidden" name="group" value="1">
<table><tr>
<?php include 'php119.php'; ?><th style="width:3%"><label><input type="checkbox" title="<?php include 'php120.php'; ?>" onclick="checkbox_toggle()"></label></th><?php include 'php121.php'; ?>
<th><?php include 'php122.php'; ?></th><th style="width:10%"><?php include 'php123.php'; ?></th>
<th style="width:12%"><?php include 'php124.php'; ?></th>
<?php include 'php125.php'; ?><th style="width:6%"><?php include 'php126.php'; ?></th><th style="width:10%"><?php include 'php127.php'; ?></th><?php include 'php128.php'; ?>
<th style="width:<?php include 'php129.php'; ?>13<?php include 'php130.php'; ?>6.5<?php include 'php131.php'; ?>%"></th></tr>
<?php include 'php132.php'; ?>
<tr><?php include 'php133.php'; ?><td></td><?php include 'php134.php'; ?><td colspan="<?php include 'php135.php'; ?>"><a href="?p=<?php include 'php136.php'; ?>"><i class="icon-arrow_up"></i> ..</a></td></tr>
<?php include 'php137.php'; ?>
<tr>
<?php include 'php138.php'; ?><td><label><input type="checkbox" name="file[]" value="<?php include 'php139.php'; ?>"></label></td><?php include 'php140.php'; ?>
<td><div class="filename"><a href="?p=<?php include 'php141.php'; ?>"><i class="<?php include 'php142.php'; ?>"></i> <?php include 'php143.php'; ?></a><?php include 'php144.php'; ?></div></td>
<td><?php include 'php145.php'; ?></td><td><?php include 'php146.php'; ?></td>
<?php include 'php147.php'; ?>
<td><?php include 'php148.php'; ?><a title="<?php include 'php149.php'; ?>" href="?p=<?php include 'php150.php'; ?>&amp;chmod=<?php include 'php151.php'; ?>"><?php include 'php152.php'; ?></a><?php include 'php153.php'; ?><?php include 'php154.php'; ?><?php include 'php155.php'; ?></td>
<td><?php include 'php156.php'; ?></td>
<?php include 'php157.php'; ?>
<td><?php include 'php158.php'; ?>
<a title="<?php include 'php159.php'; ?>" href="?p=<?php include 'php160.php'; ?>&amp;del=<?php include 'php161.php'; ?>" onclick="return confirm('<?php include 'php162.php'; ?>');"><i class="icon-cross"></i></a>
<a title="<?php include 'php163.php'; ?>" href="#" onclick="rename('<?php include 'php164.php'; ?>', '<?php include 'php165.php'; ?>');return false;"><i class="icon-rename"></i></a>
<a title="<?php include 'php166.php'; ?>" href="?p=&amp;copy=<?php include 'php167.php'; ?>"><i class="icon-copy"></i></a>
<?php include 'php168.php'; ?>
<a title="<?php include 'php169.php'; ?>" href="<?php include 'php170.php'; ?>" target="_blank"><i class="icon-chain"></i></a>
</td></tr>
    <?php include 'php171.php'; ?>
<tr>
<?php include 'php172.php'; ?><td><label><input type="checkbox" name="file[]" value="<?php include 'php173.php'; ?>"></label></td><?php include 'php174.php'; ?>
<td><div class="filename"><a href="<?php include 'php175.php'; ?>" title="<?php include 'php176.php'; ?>"><i class="<?php include 'php177.php'; ?>"></i> <?php include 'php178.php'; ?></a><?php include 'php179.php'; ?></div></td>
<td><span title="<?php include 'php180.php'; ?>"><?php include 'php181.php'; ?></span></td>
<td><?php include 'php182.php'; ?></td>
<?php include 'php183.php'; ?>
<td><?php include 'php184.php'; ?><a title="<?php include 'php185.php'; ?>" href="?p=<?php include 'php186.php'; ?>&amp;chmod=<?php include 'php187.php'; ?>"><?php include 'php188.php'; ?></a><?php include 'php189.php'; ?><?php include 'php190.php'; ?><?php include 'php191.php'; ?></td>
<td><?php include 'php192.php'; ?></td>
<?php include 'php193.php'; ?>
<td>
<?php include 'php194.php'; ?>
<a title="<?php include 'php195.php'; ?>" href="?p=<?php include 'php196.php'; ?>&amp;del=<?php include 'php197.php'; ?>" onclick="return confirm('<?php include 'php198.php'; ?>');"><i class="icon-cross"></i></a>
<a title="<?php include 'php199.php'; ?>" href="#" onclick="rename('<?php include 'php200.php'; ?>', '<?php include 'php201.php'; ?>');return false;"><i class="icon-rename"></i></a>
<a title="<?php include 'php202.php'; ?>" href="?p=<?php include 'php203.php'; ?>&amp;copy=<?php include 'php204.php'; ?>"><i class="icon-copy"></i></a>
<?php include 'php205.php'; ?>
<a title="<?php include 'php206.php'; ?>" href="<?php include 'php207.php'; ?>" target="_blank"><i class="icon-chain"></i></a>
<a title="<?php include 'php208.php'; ?>" href="?p=<?php include 'php209.php'; ?>&amp;dl=<?php include 'php210.php'; ?>"><i class="icon-download"></i></a>
</td></tr>
    <?php include 'php211.php'; ?>
<tr><?php include 'php212.php'; ?><td></td><?php include 'php213.php'; ?><td colspan="<?php include 'php214.php'; ?>"><em><?php include 'php215.php'; ?></em></td></tr>
<?php include 'php216.php'; ?>
<tr><?php include 'php217.php'; ?><td class="gray"></td><?php include 'php218.php'; ?><td class="gray" colspan="<?php include 'php219.php'; ?>">
<?php include 'php220.php'; ?> <span title="<?php include 'php221.php'; ?>"><?php include 'php222.php'; ?></span>,
<?php include 'php223.php'; ?> <?php include 'php224.php'; ?>,
<?php include 'php225.php'; ?> <?php include 'php226.php'; ?>
</td></tr>
<?php include 'php227.php'; ?>
</table>
<?php include 'php228.php'; ?>
<p class="path"><a href="#" onclick="select_all();return false;"><i class="icon-checkbox"></i> <?php include 'php229.php'; ?></a> &nbsp;
<a href="#" onclick="unselect_all();return false;"><i class="icon-checkbox_uncheck"></i> <?php include 'php230.php'; ?></a> &nbsp;
<a href="#" onclick="invert_all();return false;"><i class="icon-checkbox_invert"></i> <?php include 'php231.php'; ?></a></p>
<p><input type="submit" name="delete" value="<?php include 'php232.php'; ?>" onclick="return confirm('<?php include 'php233.php'; ?>')">
<input type="submit" name="zip" value="<?php include 'php234.php'; ?>" onclick="return confirm('<?php include 'php235.php'; ?>')">
<input type="submit" name="copy" value="<?php include 'php236.php'; ?>"></p>
<?php include 'php237.php'; ?>
</form>

<?php include 'php238.php'; ?>
<div class="path">
<div class="float-right">
<?php include 'php239.php'; ?>
<a title="<?php include 'php240.php'; ?>" href="?p=<?php include 'php241.php'; ?>&amp;upload"><i class="icon-upload"></i></a>
<a title="<?php include 'php242.php'; ?>" href="#" onclick="newfolder('<?php include 'php243.php'; ?>');return false;"><i class="icon-folder_add"></i></a>
<?php include 'php244.php'; ?>
<?php include 'php245.php'; ?><a title="<?php include 'php246.php'; ?>" href="?logout=1"><i class="icon-logout"></i></a><?php include 'php247.php'; ?>
</div>
        <?php include 'php248.php'; ?>
</div>
<?php include 'php249.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File Manager</title>
<link href='css000.css' rel='stylesheet'>
<link rel="icon" href="<?php include 'php250.php'; ?>?img=favicon" type="image/png">
<link rel="shortcut icon" href="<?php include 'php251.php'; ?>?img=favicon" type="image/png">
<?php include 'php252.php'; ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/styles/<?php include 'php253.php'; ?>.min.css">
<?php include 'php254.php'; ?>
</head>
<body>
<div id="wrapper">
<?php include 'php255.php'; ?>
<p class="center"><small><a href="https://github.com/alexantr/filemanager" target="_blank">PHP File Manager</a></small></p>
</div>
<script src='js000.js'>js</script>
<?php include 'php256.php'; ?>
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.2.0/highlight.min.js"></script>
<script src='js001.js'>js</script>
<?php include 'php257.php'; ?>
</body>
</html>
<?php include 'php258.php'; ?>