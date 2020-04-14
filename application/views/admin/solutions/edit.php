<div class="content-box"><!-- Start Content Box -->
  
  <div class="content-box-header">
    <h3><?php echo $title_text; ?></h3>
    <div class="clear"></div>
  </div>
  <!-- End .content-box-header -->
  
  <div class="content-box-content">
    <div class="tab-content default-tab">
      <form action="<?php echo site_url('a_solutions/save'); ?>" method="post" id="form1"  enctype="multipart/form-data" onsubmit="return checkinfo(this);" />
      <input type="hidden" name="id" value="<?php echo $id; ?>" />
   
    <p>分　类：<select id="sid" name="sid">
    <?php foreach($sort as $item){ ?>
        <option value="<?php echo $item['id']; ?>"><?php echo $item['sortname']; ?></option>
    <?php } ?>
    </select>
    <script type="text/javascript"> $('#sid').val(<?php echo $id?$sid:''; ?>);</script>
      </p>
      <p>
        首页显示：
        <input name="index" type="radio" value="1" <?php if($id){ echo $index == 1?'checked':''; }?> >是
        <input name="index" type="radio" value="0" <?php if($id){ echo $index == 0?'checked':''; }?> >否
      </p>
      
      <p>标　题：<input type="text" name="title" value="<?php echo $id?$title:'';?>"  class="text-input medium-input datepicker" /></p>
      
      

      <p>标题前面的数字：<input type="file" name="upfile[]" id="upfile" /><b>（最佳大小69 x 66 像素,图片不能大于1M）</b></p>
      图片：<input type="file" name="upfile[]" id="upfile2" /><b>（最佳大小399 x 239 像素,图片不能大于50k）</b>
      </p>
      <p>
        <input type="hidden" name="old_cur_name" value="<?php echo $id?$curFile:''; ?>" />
        <input type="hidden" name="old_hover_name" value="<?php echo $id?$hoverFile:''; ?>" />
        <?php if($id){ ?>
      <p>预览图片：
      <img src="<?php echo base_url().'upload/solutions/'.$curFile; ?>" width="69" height="66" />
      <img src="<?php echo base_url().'upload/solutions/'.$hoverFile; ?>" width="190" height="170" />
        <?php } ?>
        
      <p>【系统简介】 <textarea class="editor_id"  name="content" style="height:200px;"><?php echo $id?$content:''; ?></textarea></p>  
      <p>【产品概述】 
      	<textarea class="editor_id" name="content1" style="height:300px;"><?php echo $id?$content1:''; ?></textarea>
      </p>
      
      <p>【系统组成】
      	<textarea class="editor_id" name="content2" style="height:300px;"><?php echo $id?$content2:''; ?></textarea>
      </p>
      
      <p>【基本功能】
      	<textarea class="editor_id" name="content3" style="height:300px;"><?php echo $id?$content3:''; ?></textarea>
      </p>
      
      <p>【系统特点】
      	<textarea class="editor_id" name="content4" style="height:300px;"><?php echo $id?$content4:''; ?></textarea>
      </p>
      
      <p>
        <input class="button" type="submit" value="<?php echo $button_name; ?>"/>
        <input class="button" type="button" value="返回" onclick="javascript:history.go(-1);" />
      </p>
      </form>
    </div>
    <!-- End tab1 --> 
  </div>
  <!-- End content-box-content --> 
</div>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/kindeditor.js'); ?>"></script>
<script charset="utf-8" src="<?php echo base_url('resources/HMKindEditor/lang/zh_CN.js'); ?>"></script>
<script>
        KindEditor.ready(function(K) {
        	window.editor = K.create('.editor_id');
        });
</script>

