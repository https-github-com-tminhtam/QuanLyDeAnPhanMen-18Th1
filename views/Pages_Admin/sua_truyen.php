<ol class="breadcrumb mx-2">
    <li class="breadcrumb-item"><a href="bang-dieu-khien"><i class="fas fa-home"></i> Trang Chủ</a></li>
    <li class="breadcrumb-item"><a href="truyen-cua-toi">Truyện Của Tôi</a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo $data['truyen']['title']; ?></li>
    <li class="breadcrumb-item active" aria-current="page">Sửa truyện</li>
</ol>

<div class="container-fluid">
    <div class="card card-outline card-info">
        <form id="KiemTraTaoTruyen" action="index.php?url=xu-ly-sua-truyen" method="POST">
            <input type="text" name="id" value="<?php echo $data['truyen']['id']; ?>" hidden>
            <input type="text" name="title_u_cu" value="<?php echo $data['truyen']['title_u']; ?>" hidden>

            <div class="card-body">
                <div class="form-group">
                    <label for="title"><i class="fas fa-chess-knight"></i> Tên Truyện*</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Tên bài đăng..." maxlength="150" value="<?php echo $data['truyen']['title']; ?>" required>
                    <small class="text-danger">Để tránh trùng lặp, hãy tìm tên truyện bằng công cụ tìm kiếm trước khi có ý định thêm truyện. Lưu ý, nhiều truyện có tên tương tự nhau nhưng vẫn là một truyện. Ví dụ: `Bá Đạo Học Sinh` với `Bá Đạo Sinh viên`. Vì vậy, cần bỏ đi một số từ trong từ khóa cần tìm để ra nhiều kết quả hơn.</small>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-image"></i> <b id="images">Ảnh Truyện*</b></label> 
                    <div class="input-group mb-3">
                        <input id="AnhTruyen" name="img" type="text" class="form-control" placeholder="Ảnh truyện..." maxlength="2000" value="<?php echo $data['truyen']['img']; ?>" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2" style="cursor: pointer;" onclick="BrowseServer()">Chọn hình</span>
                        </div>
                    </div>
                    <small class="text-muted">Nên chọn hình ảnh có kích thước <b>564 x 798</b>px.</small>
                </div>

                <div class="form-group">
                    <label><i class="fas fa-image"></i> <b id="images">Ảnh Bìa</b></label> 
                    <div class="input-group mb-3">
                        <input id="AnhBia" name="thumb" type="text" class="form-control" placeholder="Ảnh bìa..." maxlength="2000" value="<?php echo $data['truyen']['thumb']; ?>">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2" style="cursor: pointer;" onclick="BrowseThumb()">Chọn hình</span>
                        </div>
                    </div>
                    <small class="text-muted">Ảnh bìa có thể bỏ trống nếu truyện này <b>không được đề cử</b>. Nên chọn hình có kích thước <b>748 x 298</b>px.</small>
                </div>

                <div class="form-group mt-2">
                    <label for="author"><i class="fas fa-feather-alt"></i> Tác Giả*</label>
                    <input type="text" name="author" class="form-control" id="author" placeholder="Tác giả..." maxlength="150" value="<?php echo $data['truyen']['author']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="loai-truyen"><i class="fas fa-ellipsis-v"></i> Loại Truyện*</label>
                    <select class="form-control" id="loai-truyen" name="loai-truyen" required>
                        <option value="no_select">--chọn--</option>
                        <option value="Truyện Dịch" <?php if($data['truyen']['type'] == 'Truyện Dịch') echo 'selected'; ?>>Truyện Dịch</option>
                        <option value="Truyện Convert" <?php if($data['truyen']['type'] == 'Truyện Convert') echo 'selected'; ?>>Truyện Convert</option>
                        <option value="Sáng Tác" <?php if($data['truyen']['type'] == 'Sáng Tác') echo 'selected'; ?>>Sáng Tác</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="TrangThaiTruyen"><i class="fas fa-ellipsis-v"></i> Trạng Thái*</label>
                    <select class="form-control" id="TrangThaiTruyen" name="status" required>
                        <option value="no_select">--chọn--</option>
                        <option value="Đang cập nhật" <?php if($data['truyen']['status'] == 'Đang cập nhật') echo 'selected'; ?>>Đang cập nhật</option>
                        <option value="Hoàn thành" <?php if($data['truyen']['status'] == 'Hoàn thành') echo 'selected'; ?>>Hoàn thành</option>
                        <option value="Ngừng" <?php if($data['truyen']['status'] == 'Ngừng') echo 'selected'; ?>>Ngừng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="review"><i class="fas fa-compass"></i> Giới Thiệu Truyện*</label>
                    <textarea class="form-control ckeditor" name="review" id="review" placeholder="Tóm tắt truyện ngắn gọn..." maxlength="2000" required><?php echo $data['truyen']['review']; ?></textarea>
                    <small class="form-text text-muted"><i class="fas fa-exclamation-triangle"></i> Giới thiệu truyện tối đa <b>2000 ký tự</b>, tóm tắt cho truyện không nên quá dài mà nên ngắn gọn, tập trung, thú vị, phần này rất quan trọng vì nó quyết định độc giả có đọc hay không.</small>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-tag"></i> Tag</label>
                </div>

                <div class="custom-control custom-checkbox mr-sm-2">
                    <!-- nội dung tag -->
                    <div class="custom-control custom-checkbox mr-sm-2">
                        <?php $colum = 1; foreach($data['tag'] as $value){ ?>
                        <span class="mr-5">
                            <input type="checkbox" class="custom-control-input" value="<?php echo $value['title']; ?>" id="<?php echo $value['title']; ?>" name="<?php echo $colum; ?>" <?php foreach($data['tag_truyen'] as $value1){ if($value1['title_theloai'] == $value['title']) echo 'checked'; } ?>>
                            <label class="custom-control-label" for="<?php echo $value['title']; ?>" style="font-weight: 400; cursor: pointer;"><?php echo $value['title']; ?></label>
                        </span>
                        <?php $colum++; } ?>
                    </div>
                    <!-- end nội dung tag -->
                    <br>
                </div>
                <div class="form-group mt-2">
                    <label for="source"><i class="fab fa-sourcetree"></i> Nguồn*</label>
                    <input type="text" name="source" class="form-control" id="source" placeholder="Nguồn..." maxlength="1500" value="<?php echo $data['truyen']['source']; ?>" required>
                </div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="DeCu" name="DeCu" <?php if($data['truyen']['de_cu'] == 1) echo 'checked'; ?> <?php if($_SESSION['tangkinhcac_loai'] == 1) echo 'disabled'; ?>>
                    <label class="custom-control-label" for="DeCu" style="cursor: pointer;">Đề Cử Truyện Này</label>
                    (<small class="text-muted"><i class="fas fa-exclamation-triangle"></i> Chỉ có <b>quản trị viên</b> mới có thể bật chức năng này</small>)
                </div>
            </div>
            <div class="card-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập Nhật</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php  
    if(isset($_COOKIE['error_message'])){
        echo '<script>Error("'.$_COOKIE['error_message'].'")</script>';
    }
?>

<script type="text/javascript">
    $("title").text("Trang Quản Trị | Sửa Truyện"); 
</script>