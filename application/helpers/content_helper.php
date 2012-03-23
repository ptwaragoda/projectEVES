<?
function formatPrice($price, $currencySymbol = '$')
{
	return $currencySymbol.number_format((double)$price, 2, '.', ',');
}

function dashboardLink($text,$link,$image,$extraClass="mr10")
{
	return '
		<a href="'.$link.'" title="'.$text.'" class="btn55 '.$extraClass.'">
        	<img src="'.base_url().'public/images/icons/middlenav/'.$image.'" alt="'.$text.'" />
        	<span>'.$text.'</span>
       	</a>
	';
}

function getYoutubeVideo($url, $height='187', $width='280')
{
	 return '<iframe allowfullscreen="" frameborder="0" height="'.$height.'" src="'.$url.'" width="'.$width.'"></iframe>';
}

function printFormInput($name, $label, $value='', $error='')
{
	return '<div class="field"><label for="'.$name.'">'.$label.' </label> <input id="'.$name.'" name="'.$name.'" size="50" type="text" class="medium" value="'.$value.'" />'.
	($error?'<div class="error">'.$error.'</div>':'').'</div>';
}

function printFormInputDate($name, $label, $value='', $error='')
{
	return '<div class="field"><label for="'.$name.'">'.$label.' </label> <input id="'.$name.'" name="'.$name.'" size="50" type="text" class="datepicker medium" value="'.$value.'" />'.
	($error?'<div class="error">'.$error.'</div>':'').'</div>';
}

function printFormFileUpload($name, $label, $error='')
{
	return '<div class="field clearfix">								
		<label for="'.$name.'">'.$label.'</label> 								
		<input style="opacity: 0;" class="file" type="file" name="'.$name.'" id="'.$name.'"/>'.
		($error?'<div style="clear:both"></div><div class="error">'.$error.'</div>':'').'</div>';
}

function printFormTextarea($name, $label, $value='',$error='',$width=NULL,$height=NULL,$rich=FALSE)
{
	return '<div class="field">
		<label for="'.$name.'">'.$label.'</label> 
			<div style="float:left"><textarea '.($rich?'class="ckeditor"':'').' style="'.($width!=NULL?'width:'.$width.'px;':'').($height!=NULL?'height:'.$height.'px':'').'" rows="7" cols="50" id="'.$name.'" name="'.$name.'">'.$value.'</textarea></div>
			'.($error?'<div style="clear:both"></div><div class="error">'.$error.'</div>':'').'
		</div>';
}

function getThumb($url, $width=NULL, $height=NULL, $zc=0)
{
	if($width == NULL && $height == NULL)
	{
		$hw = '&w=100&h=100';
	}
	elseif($width == NULL)
	{
		$hw = ('&h='.$height);
	}
	elseif($height == NULL)
	{
		$hw = ('&w='.$width);
	}
	else
	{
		$hw = ('&h='.$height.'&w='.$width);
	}
	
	return base_url().'timthumb.php?src='.base_url().'uploads/'.$url.'&q=100&zc='.$zc.$hw;
}

function prettyPrint($variable)
{
	echo "<pre>";
	print_r($variable);
	echo "</pre>";
}

function successMsg($var)
{
	$CI =& get_instance();

	if($CI->session->flashdata($var))
		echo '<p class="msg done">'.$CI->session->flashdata($var).'</p>';
}

function getPaginationLinks($current_page, $total_pages, $current_url, $num = 10)
{
	if($num%2 == 0)
	{
		$diff = ($num/2);
	}
	else
	{
		$diff = ($num+1)/2;
	}
	
	$rem = $diff -1;
	
	if($total_pages < $num)
	{
		return getLinksForPagination(1, $total_pages, $current_page, $current_url,$total_pages);
	}
	else
	{
		if($current_page <=$diff)
			return getLinksForPagination(1, $num, $current_page, $current_url,$total_pages);
		elseif($current_page >= ($total_pages - $rem))
		{
			if($num%2 == 0)
				return getLinksForPagination(($total_pages - ($rem*2) -1), $total_pages, $current_page, $current_url,$total_pages);
			else
				return getLinksForPagination(($total_pages - ($rem*2)), $total_pages, $current_page, $current_url,$total_pages);
		}
		else
		{
			if($num%2 == 0)
				return getLinksForPagination(($current_page -$rem), ($current_page +$rem+1), $current_page, $current_url,$total_pages);
			else
				return getLinksForPagination(($current_page -$rem), ($current_page +$rem), $current_page, $current_url,$total_pages);
		}
			
	}
}

function getLinksForPagination($start, $end, $current_page, $current_url,$total_pages)
{
	$tempStr = '';
	for($i=$start;$i<=$end;$i++)
	{
		$tempStr .= ($i == $current_page)?'<a class="pagination-active">'.$i.'</a>':'<a href="'.$current_url.$i.'">'.$i.'</a>';
	}
	if($total_pages<$start || $total_pages>$end)
		$tempStr .= (' ... '.'<a href="'.$current_url.$total_pages.'">'.$total_pages.'</a>');
	return $tempStr;
}