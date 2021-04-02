# Bài tập Validation

* Mã SV (45.01.104.001), phải nhập, 13 kí tự
required:true, rangelength:[13,13]

* Họ tên: phải nhập, tối thiểu 5 ký tự

* Ngày sinh: đúng định dạng date
date:true

* Email: Phải nhập và là gmail
email: true

* Xác nhận email: giống email đã nhập
equalTo: "#txtEmail"

* Số tài khoản: creditCard: true

* Hình: chỉ cho chọn hình png/jpg/bmp

* Điểm: số thực, từ 0 --> 10
number: true, range: [0, 10]

* Hệ số: số nguyên
digits: true, min:1

* Thông tin thêm: tối đa 255 kí tự