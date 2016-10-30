<?php
    require_once 'config/config.php';
    include 'admincp/modules/phantrang.php';
    if(isset($_GET['idtheloai']))
    {
        $id = $_GET['idtheloai'];
        $sql = "SELECT t.id,t.tentin,t.anhminhhoa,t.tomtat FROM tintuc t 
        JOIN theloai tl ON t.idtheloai=tl.id 
        JOIN loaitin lt ON tl.idloaitin=lt.idloaitin
        WHERE t.idtheloai={$id} AND lt.idloaitin=2";
    }
    if(isset($_GET['search']))
    {
        if(isset($_GET['key'])){
            $key = $_GET['key'];
            $sql = "SELECT tt.id,tt.tentin,tt.anhminhhoa,tt.tomtat FROM tintuc tt 
            JOIN theloai tl ON tt.idtheloai=tl.id
            WHERE tt.tentin LIKE '%{$key}%' OR tt.tomtat LIKE '%{$key}%' OR tl.ten LIKE '%{$key}%'";
        }
    }
    $PT = new phantrang;
    $result = mysqli_query($quanlyktx,$sql);
    $total_record = mysqli_num_rows($result);
    $limit = 8;


    $will_page = !empty($_GET) ? $_GET : array();

    $will_page1 = http_build_query($will_page);
    //if(!preg_match("/id/",$will_page1))
    if(!isset($_GET['page']))
    {
        $will_page1 = $will_page1.'&page=';
    }
    else
    {
        $will_page1 = substr($will_page1, 0,(strlen($will_page1)-1));
    }

    $config = array('TotalRecord'=> $total_record,
                    'PerPage'=>$limit,
                    'CurrentPage'=>isset($_GET['page'])?$_GET['page']:1,
                    'LinkFirst' => "index.php?$will_page1"."1",
                    'LinkFull' => "index.php?$will_page1"
                );
    $PT->init($config);
    $start = $PT->Start;
    $sql = $sql." ORDER BY id DESC LIMIT $start, $limit";
    $list = mysqli_query($quanlyktx,$sql);
    while($row_list = mysqli_fetch_assoc($list))
    {
?>
        <div class="tintuc">
            <img src="<?php echo $row_list['anhminhhoa'] ?>" width="150" >
            <div class="">
                <a style="color:#73AD21" href="index.php?idbaiviet=<?php echo $row_list['id']?>">
                    <h3 color="#73AD21"><?php echo $row_list['tentin']?></h3>
                </a>
                <p><?php echo $row_list['tomtat']?></p>
            </div>
            <div class="clr"></div>
        </div>
<?php
    }
?>