<div class="my-card card shadow-sm mb-3">
	<h5 class="card-header font-roman py-2 font-weight-bolder my-t-shadow bg-xanh"><i class="fab fa-galactic-senate"></i> THỂ LOẠI <span class="text-uppercase"><?php echo $_GET['title']; ?></span> <span class="float-right" style="color: gold;"><?php echo count($data['theloai']); ?> TRUYỆN</span></h5>
	<div class="card-body py-0 pb-3 my-pad">
		<div class="row">
			<!-- nội dung truyện hot -->
			<?php foreach($data['theloai'] as $value){ ?>
			<div class="col-md-2 col-6 my-2 test">
				<div class="my-card card bg-dark">
					<a href="truyen/<?php echo $value['title_u']; ?>.html">
						<div class="card-body py-0 px-0 position-relative">
							<img src="./storage/<?php echo $value['img']; ?>" class="img-fluid my-thumb">
							<span class="the-chuong position-absolute"><?php echo $value['num_chaps']; ?> chương</span>
						</div>
						<div class="card-footer py-1 font-roman title-truyen-home"><?php echo $value['title']; ?></div>
					</a>
				</div>
			</div>
			<?php } ?>
			<!-- end nội dung truyện hot -->
		</div>
	</div>
</div>

<script type="text/javascript">
	$('title').text("Tàng Kinh Các | <?php echo $_GET['title']; ?>");
</script>