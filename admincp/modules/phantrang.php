<?php
	class phantrang
	{
		var $TotalPage = 0;
		var $Start = 0;
		static $STT =null;

		var $_config = array('TotalRecord' => 0,
					 'PerPage' => 0,
					 'CurrentPage' => 1,
					 'LinkFirst' => 'a',
					 'LinkFull' => 'a'
					);
		function init($config = array())
		{
			foreach ($config as $key => $value) 
			{
				if(isset($this->_config[$key]))
				{
					$this->_config[$key] = $value;
				}
			}
			if($this->_config['TotalRecord'] < $this->_config['PerPage'])
			{
				$this->TotalPage = 1;
			}
			else
			{
				$this->TotalPage = ceil($this->_config['TotalRecord'] / $this->_config['PerPage']);
			}
			$this->Start = ($this->_config['CurrentPage'] - 1) * $this->_config['PerPage'] ;
			if($this->Start < 0) $this->Start = 0;
		}
		function _link($page)
		{
			if($page == 1)
			{
				return $this->_config['LinkFirst'];
			}
			else return $this->_config['LinkFull'].$page;
		}
		function PrintDS($sotrang)
		{
			if($this->TotalPage <= $sotrang)
			{
				for ($i=1; $i<=$this->TotalPage; $i++)
				{
					if($this->_config['CurrentPage'] == $i)
					{
						echo "<span class='sp-trang'>".$i."</span>";
					}
					else
					{
						echo "<a href='".$this->_link($i)."' class='trang'>".$i."</a>";
					}
				}
			}
			else
			{
				$ketqua = ($this->TotalPage / $sotrang);
				$a=explode(".",$ketqua);
				$phannguyenmax =$a[0];
				$ketqua = $this->_config['CurrentPage']/$sotrang;
				$a=explode(".",$ketqua);
				$phannguyen = $a[0];
				$phandu = $this->TotalPage % $sotrang;
				$phandu_trang = $this->_config['CurrentPage'] % $sotrang;
				if($phandu!=0)
				{
					if($phandu_trang==0) $phannguyen--;
					if($phannguyen==$phannguyenmax) $trang = $phandu;
					else $trang = $sotrang;
				}
				else 
				{
					$trang = $sotrang;
					if($phandu_trang==0) $phannguyen--;
				}
				

				if($this->_config['CurrentPage']>1)
				{
					echo "<a href='".$this->_link(1)."' class='trang'>First</a>";
					echo "<a href='".$this->_link($this->_config['CurrentPage']-1)."' class='trang'><<</a>";
				}
				for($j=(($phannguyen*$sotrang)+1); $j<=(($phannguyen*$sotrang)+$trang);$j++)
				{
					
					if($this->_config['CurrentPage'] == $j)
					{
						echo "<span class='sp-trang'>".$j."</span>";
					}
					else
					{
						echo "<a href='".$this->_link($j)."' class='trang'>".$j."</a>";
					}
				}
				if($this->_config['CurrentPage']<$this->TotalPage)
				{
					echo "<a href='".$this->_link($this->_config['CurrentPage']+1)."' class='trang'>>></a>";
					echo "<a href='".$this->_link($this->TotalPage)."' class='trang'>Last</a>";
				}
			}
		}
	}
?>