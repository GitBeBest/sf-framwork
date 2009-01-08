<div>
  <h1>Category::edit</h1>
  <form id="validateForm" name="validateForm" method="post" action="<?=site_url("admin/category_controller/edit")?>">
    <ul>
      <li>
        <label> Parent</label>
        <label>
          <select name="parent_id" id="parent_id" class="required">
            <option value="0">root</option>
            <?php
	 while($parent = $parent_data->getObject()){
	 	echo '<option value="'.$parent->getId().'" ';
		if($parent->getId() == $category->getParentId() || $pid == $parent->getId()) echo 'selected="selected" ';
		echo '>'.$parent->getHeadStr().$parent->getSubject().'</option>';
	 }
	?>
          </select><em>*</em>
        </label>
      </li>
      <li>
        <label> Subject
          <input name="subject" type="text" id="subject" value="<?=$category->getSubject()?>" class="required"/><em>*</em>
        </label>
      </li>
      <li>
        <label> Order
          <input name="orders" type="text" id="orders" value="<?=$category->getOrders()?>" />
        </label>
      </li>
      <li>
        <label> Cover
          <input name="cover" type="text" id="cover" value="<?=$category->getCover()?>" onfocus="loadbox.load('<?=site_url("common/upload")?>',function(json){$('#cover').val(json[0].path);});" />
        </label>
      </li>
    </ul>
    <p>
      <label>
        <input type="submit" name="button" id="button" value="Save" />
      </label>
      <input name="id" type="hidden" id="id" value="<?=$category->getId()?>" />
    </p>
  </form>
</div>
