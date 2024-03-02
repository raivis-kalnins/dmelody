<?php
// filter_posts
// filter_posts_cat
// filter_posts_old
// filter_posts_year
// filter_posts_tag
// filter_posts_title
// filter_posts_search
?>

<div class="filter-posts">
	<select class="filter-posts_cat">
		<option value="all">All</option>
		<option value="red">Red</option>
		<option value="green">Green</option>
	</select>
	<select class="filter-posts_date">
		<option value="all">All</option>
		<option value="red">New first</option>
		<option value="green">Old first</option>
	</select>
	<select class="filter-posts_year">
		<option value="all">All</option>
		<option value="red">Red</option>
		<option value="green">Green</option>
	</select>
	<ul class="filter-posts_tag">
		<li class="btn" data-cat="all">All</li>
		<li class="btn" data-cat="red">Red</li>
		<li class="btn" data-cat="green">Green</li>		
	</ul>
</div>

<script>

	$('select').on('change',function() {
		var val = $(this).val();
		if(val == 'all') {
			$('.posts-list_item').removeClass('hide');
		} else {
			$('.posts-list_item').removeClass('hide').filter( ':not([data-cat*="' + val + '"])' ).addClass( 'hide');
		}
	});
	$('.filter-posts_tag .btn').click(function() {
		var cat = $(this).attr('data-cat');
		$('.btn').removeClass('active');
		$(this).addClass('active');
		$('.posts-list_item').removeClass('hide').filter( '[data-cat*="' + cat + '"]' ).addClass( 'hide');
	});

</script>

<hr/>

<ul class="posts-list">
  <div class="posts-list_item" data-cat="red green" data-date="20240222" data-year="2024" data-tag="flower" data-num="1">Post 1</div>
  <div class="posts-list_item" data-cat="red" data-tag="flower" data-num="2">Post 2</div>
  <div class="posts-list_item" data-cat="green" data-tag="fruit" data-num="3">Post 3</div>
  <div class="posts-list_item" data-cat="" data-tag="flower" data-num="4">Post 4</div>
  <div class="posts-list_item" data-cat="red green" data-tag="flower" data-num="5">Post 5</div>
  <div class="posts-list_item" data-cat="red" data-tag="fruit" data-num="6">Post 6</div>
</ul>