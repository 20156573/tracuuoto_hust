		<a class="text-dark" onclick="functionXoa()" id="xac_nhan_xoa" href=""><i style="color: red" class="far fa-trash-alt"></i> Xóa</a>
                      <p ></p>

                      <script>
                      function functionXoa() {
                        var txt;
                        if (confirm("Chỉ mục cấp 1 và tất cả bài đăng, chỉ mục cấp 2 thuộc nó sẽ bị xóa, bạn chắc chắn muốn xóa chư")) {
                          txt = "delete.php?xoa=xoa_chi_muc_cap_1&ma_tro_lai=<?php echo $ma ?>&ma_chi_muc_cap_1=<?php echo  $each['ma_chi_muc_cap_1'] ?>";
                        } else {
                          txt = "";
                        }
                        document.getElementById("xac_nhan_xoa").href = txt;
                        }
                      </script>