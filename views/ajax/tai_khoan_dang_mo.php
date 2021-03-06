<?php 
	$num = 1; 
	foreach($data['danhsach'] as $value){ ?>
	<tr class="tr-<?php echo $value['user_name']; ?>">
		<th scope="row"><?php echo $num; ?></th>
		<td><?php echo $value['user_name']; ?></td>
		<td><?php echo $value['display_name']; ?></td>
		<td><?php echo $value['pass_word']; ?></td>
		<td><?php echo $value['phone']; ?></td>
		<td><?php echo $value['email']; ?></td>
		<td>
			<?php
				if($value['type_account'] == 0)
					echo '<span class="badge badge-warning">Quản Trị Viên</span>';
				else
					echo '<span class="badge badge-primary">Thành Viên</span>';
			?>
		</td>
		<td class="text-center">
			<?php if($value['lock_account'] == 1 && $value['user_name'] != "admin"){ ?>
				<button class="btn" onclick="Confirm_Lock('<?php echo $value['user_name']; ?>')"><i class="fas fa-unlock-alt t-<?php echo $value['user_name']; ?>" style="color: red;"></i></button>
			<?php } ?>
			<?php if($value['lock_account'] == 0 && $value['user_name'] != "admin"){ ?>
				<button class="btn" onclick="Confirm_Lock('<?php echo $value['user_name']; ?>')"><i class="fas fa-lock-alt t-<?php echo $value['user_name']; ?>" style="color: #007bff;"></i></button>
			<?php } ?>
			<?php if($value['user_name'] == "admin"){ ?>
			<button class="btn" onclick="Alert('Bạn không thể <b>khóa</b> tài khoản này!')"><i class="fas fa-unlock-alt" style="color: red;"></i></button>
			<?php } ?>
		</td>
		<td class="text-center">
			<?php if($value['delete_account'] == 1 && $value['user_name'] != "admin"){ ?>
				<button class="btn" onclick="Confirm_Delete('<?php echo $value['user_name']; ?>')"><i class="fas fa-trash x-<?php echo $value['user_name']; ?>" style="color: red;"></i></button>
			<?php } ?>
			<?php if($value['delete_account'] == 0 && $value['user_name'] != "admin"){ ?>
				<button class="btn" onclick="Confirm_Delete('<?php echo $value['user_name']; ?>')"><i class="fas fa-trash-restore x-<?php echo $value['user_name']; ?>" style="color: #007bff;"></i></button>
			<?php } ?>
			<?php if($value['user_name'] == "admin"){ ?>
			<button class="btn" onclick="Alert('Bạn không thể <b>xóa</b> tài khoản này!')"><i class="fas fa-trash" style="color: red;"></i></button>	
			<?php } ?>
		</td>
		<td class="text-center">
			<?php if($value['user_name'] == "admin"){ ?>
			<button class="btn" onclick="Alert('Bạn không thể <b>chỉnh sửa</b> tài khoản này!')"><i class="far fa-edit" style="color: #007bff;"></i></button>
			<?php } ?>
			<?php if($value['user_name'] != "admin"){ ?>	
			<a class="text-primary btn" href="chinh-sua-tai-khoan/<?php echo $value['user_name']; ?>"><i class="far fa-edit"></i></a>
			<?php } ?>
		</td>
	</tr>
<?php $num++; } ?>