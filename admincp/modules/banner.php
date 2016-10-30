<div class="banner">
	<div>
		<div class="row">
			<div class="col-sm-offset-4 col-sm-4 title">
				<h1 style="color: #0099e6">Trang Quản Lý Ký Túc Xá</h1>
		    </div>
			<div class="col-sm-offset-1 col-sm-1">
				<a href="../index.php" class="btn btn-default btn-md" style="width:60px">
		          <span class="glyphicon glyphicon-home"></span>
		        </a>
		    </div>
		    <div class="col-sm-1">
				<a href="#" class="btn btn-default btn-md logout" style="width:60px">
		          <span class="glyphicon glyphicon-log-out"></span>
		        </a>
		    </div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
        $("a.logout").click(function(){
            $.ajax(
                {
                    type: "GET",
                    url : "../index.php",
                    dataType: 'text',
                    data : {
                        logout : 1
                    },
                    cache: false,
                    success: function()
                    {
                        location.reload();
                    }
                });
      	 });
    });
</script>