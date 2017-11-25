<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$tpl_params 	= JFactory::getApplication()->getTemplate(true)->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);
JHtml::_('behavior.caption');
$useDefList = ($params->get('show_modify_date') || $params->get('show_publish_date') || $params->get('show_create_date')
	|| $params->get('show_hits') || $params->get('show_category') || $params->get('show_parent_category') || $params->get('show_author'));

	$post_format = $params->get('post_format', 'standard');

	$has_post_format = $tpl_params->get('show_post_format');

	if($this->print) $has_post_format = false;

?>
<article class="item item-page<?php echo $this->pageclass_sfx . ($this->item->featured) ? ' item-featured' : ''; ?>" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="inLanguage" content="<?php echo ($this->item->language === '*') ? JFactory::getConfig()->get('language') : $this->item->language; ?>" />
	<?php if ($this->params->get('show_page_heading', 1)) : ?>
	<div class="page-header">
		<h1> <?php echo $this->escape($this->params->get('page_heading')); ?> </h1>
	</div>
	<?php endif;

	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && $this->item->paginationrelative) {
		echo $this->item->pagination;
	}
?>

	<?php
		if($post_format=='standard') {
			echo JLayoutHelper::render('joomla.content.full_image', $this->item);
		} else {
			echo JLayoutHelper::render('joomla.content.post_formats.post_' . $post_format, array('params' => $params, 'item' => $this->item));
		}
	?>

	<div class="entry-header<?php echo $has_post_format ? ' has-post-format': ''; ?>">
		<?php echo JLayoutHelper::render('joomla.content.post_formats.icons',  $post_format); ?>

		<?php if (!$this->print && $useDefList && ($info == 0 || $info == 2)) : ?>
			<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'above')); ?>
		<?php endif; ?>
		
		<?php if ($params->get('show_title') || $params->get('show_author')) : ?>
			<h2 itemprop="name">
				<?php if ($params->get('show_title')) : ?>
					<?php echo $this->escape($this->item->title); ?>
				<?php endif; ?>
			</h2>
			<?php if ($this->item->state == 0) : ?>
				<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
			<?php endif; ?>
			<?php if (strtotime($this->item->publish_up) > strtotime(JFactory::getDate())) : ?>
				<span class="label label-warning"><?php echo JText::_('JNOTPUBLISHEDYET'); ?></span>
			<?php endif; ?>
			<?php if ((strtotime($this->item->publish_down) < strtotime(JFactory::getDate())) && $this->item->publish_down != '0000-00-00 00:00:00') : ?>
				<span class="label label-warning"><?php echo JText::_('JEXPIRED'); ?></span>
			<?php endif; ?>
		<?php endif; ?>
	</div>

	<?php if (!$this->print) : ?>
		<?php if ($canEdit || $params->get('show_print_icon') || $params->get('show_email_icon')) : ?>
			<?php echo JLayoutHelper::render('joomla.content.icons', array('params' => $params, 'item' => $this->item, 'print' => false)); ?>
		<?php endif; ?>
	<?php else : ?>
		<?php if ($useDefList) : ?>
			<div id="pop-print" class="btn hidden-print">
				<?php echo JHtml::_('icon.print_screen', $this->item, $params); ?>
			</div>
		<?php endif; ?>
	<?php endif; ?>

	<?php if (!$params->get('show_intro')) : echo $this->item->event->afterDisplayTitle; endif; ?>
	<?php echo $this->item->event->beforeDisplayContent; ?>

	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '0')) || ($params->get('urls_position') == '0' && empty($urls->urls_position)))
		|| (empty($urls->urls_position) && (!$params->get('urls_position')))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php if ($params->get('access-view')):?>

	<?php //echo JLayoutHelper::render('joomla.content.full_image', $this->item); ?>

	<?php
	if (!empty($this->item->pagination) && $this->item->pagination && !$this->item->paginationposition && !$this->item->paginationrelative):
		echo $this->item->pagination;
	endif;
	?>
	<?php if (isset ($this->item->toc)) :
		echo $this->item->toc;
	endif; ?>
	<div itemprop="articleBody">
		<?php echo $this->item->text; ?>
	</div>





<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="container">
<h2>Tell us what you need done</h2>
<h5><span style="color: #808080;">Get free quotes from skilled freelancers within minutes, view profiles, ratings and portfolios and chat with them. Pay the freelancer only when you are 100% satisfied with their work</span></h5>
<form action="<?php echo JRoute::_('index.php?option=com_content&view=article&id=8'); ?>" method="post" enctype="multipart/form-data">
<div class="form-group">
<label for="inputdefault">Choose a name for your project</label> 
<input id="inputdefault" class="form-control" type="text" name="pname" />
</div>
<div class="form-group">
<label for="comment">Tell us more about your project</label> 
<textarea id="comment" class="form-control" rows="5" name="pabout"></textarea>
</div>
<div class="form-group">
<label for="inputlg">What skills are required?</label>
<input id="inputlg" class="form-control" type="text" name="skills" />
</div>
<div class="form-group">
<label class="btn btn-default btn-file"> Upload File <input style="display: none;" type="file" name="data" /> </label>
</div>
<div class="form-group"><button class="btn btn-primary" type="submit" name="submit">Submit</button></div>
</form>
<?php $di = date('Y-m-d H:i:s');
       echo $di;
       ?>

<?php
if(isset($_POST['submit']))
{
//$id = setUserState('com_users.edit.profile.id');	
//$user =& JFactory::getUser();
$d = date('Y-m-d H:i:s');
$userId = $user->get( 'id' );
$pname = $_POST['pname'];
$pabout = $_POST['pabout'];
$skill = $_POST['skills'];
//z$id =$_GET['id']
//echo $userId;

$data = $_FILES['data']['name'];
$tdata = $_FILES['data']['tmp_name'];

move_uploaded_file($tdata,"files/$data");

$con = mysqli_connect('localhost','root','','jm7');
$query ="INSERT INTO `up_project`(`id`, `project_name`, `project_about`, `skill`, `data`) VALUES ('$userId', '$pname','$pabout','$skill','$d');";
	
$run = mysqli_query($con,$query);

if($run > 0)
{
	?>
 <script>
	 alert("project post succsessfully");
	 window.open('index.php','_self')
 </script>
 <?php
 
}
else
{
	?>
	<script>
	alert("ERROR !!!!!!!!!!!");
	window.open('index.php','_self')
	</script>
	<?php
};
}
?>
<?php


$con = mysqli_connect('localhost','root','','jm7');
$desc_query = "SELECT * FROM `up_project` ORDER BY `data` DESC ";// WHERE DATE(data) = DATE(NOW())";
$r = mysqli_query($con,$desc_query);
if($r)
{ 
	while($data = mysqli_fetch_assoc($r))
	{

			?>
		
<div class="w3-container">
 
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
     		<h6>Name Of Project</h6>
		      <?php echo $data['project_name']; ?>
	<div style="float: right;" ><h8><sup><?php echo $data['data']; ?></sup></h8></div>
    </header>

    <div class="w3-container">
    <h6> About Project</h6>
		     <?php echo$data['project_about']; ?>
          </div>
    <footer class="w3-container w3-blue">
      <h6>Skill</h6>
             <?php echo $data['skill']; ?>
             <label class="btn btn-default btn-file"> Bid
              <input style="display: none;" type="subimt" name="data" /> </label>
    </footer>
    <div class="w3-container w3-light-grey">
    <input type="text" placeholder="Write a comment" name="comment" class="form-control input-sm" >
    </div>
  </div>
</div>
<br><br>

     <?php
	}    
}
?>
</body>
</html>








	<?php if (!$this->print && $useDefList && ($info == 1 || $info == 2)) : ?>
		<?php echo JLayoutHelper::render('joomla.content.info_block.block', array('item' => $this->item, 'params' => $params, 'position' => 'below')); ?>
	<?php  endif; ?>

	<?php if ($info == 0 && $params->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>

	<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && !$this->item->paginationrelative):
	echo $this->item->pagination;
?>
	<?php endif; ?>
	<?php if (isset($urls) && ((!empty($urls->urls_position) && ($urls->urls_position == '1')) || ($params->get('urls_position') == '1'))) : ?>
	<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>
	<?php // Optional teaser intro text for guests ?>
	<?php elseif ($params->get('show_noauth') == true && $user->get('guest')) : ?>
	<?php echo $this->item->introtext; ?>
	<?php //Optional link to let them register to see the whole article. ?>
	<?php if ($params->get('show_readmore') && $this->item->fulltext != null) :
		$link1 = JRoute::_('index.php?option=com_users&view=login');
		$link = new JUri($link1);?>
	<p class="readmore">
		<a href="<?php echo $link; ?>">
		<?php $attribs = json_decode($this->item->attribs); ?>
		<?php
		if ($attribs->alternative_readmore == null) :
			echo JText::_('COM_CONTENT_REGISTER_TO_READ_MORE');
		elseif ($readmore = $this->item->alternative_readmore) :
			echo $readmore;
			if ($params->get('show_readmore_title', 0) != 0) :
				echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
			endif;
		elseif ($params->get('show_readmore_title', 0) == 0) :
			echo JText::sprintf('COM_CONTENT_READ_MORE_TITLE');
		else :
			echo JText::_('COM_CONTENT_READ_MORE');
			echo JHtml::_('string.truncate', ($this->item->title), $params->get('readmore_limit'));
		endif; ?>
		</a>
	</p>
	<?php endif; ?>
	<?php endif; ?>

	<?php
if (!empty($this->item->pagination) && $this->item->pagination && $this->item->paginationposition && $this->item->paginationrelative) :
	echo $this->item->pagination;
?>
	<?php endif; ?>

	<?php echo $this->item->event->afterDisplayContent; ?>

	<?php if(!$this->print) : ?>
		<?php echo JLayoutHelper::render('joomla.content.social_share.share', $this->item); //Helix Social Share ?>
		<?php echo JLayoutHelper::render('joomla.content.comments.comments', $this->item); //Helix Comment ?>
	<?php endif; ?>
	
</article>
