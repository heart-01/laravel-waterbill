<?php
    //Home
    Breadcrumbs::for('home', function ($trail) {
        $trail->push('หน้าแรก', route('home'));
    });
    //Profiles
    Breadcrumbs::for('profiles.edit', function ($trail,$id) {
        $trail->parent('home');
        $trail->push('แก้ไขข้อมูลส่วนตัว', route('profiles.edit',$id));
    });
    Breadcrumbs::for('profiles.change.index', function ($trail) {
        $trail->parent('home');
        $trail->push('เปลี่ยนรหัสผ่าน', route('profiles.change.index'));
    });
    //Address
    Breadcrumbs::for('address', function ($trail) {
        $trail->parent('home');
        $trail->push('ที่อยู่', route('address'));
    });
    Breadcrumbs::for('address.fetch_data', function ($trail) {
        $trail->parent('home');
        $trail->push('ที่อยู่', route('address'));
    });
    Breadcrumbs::for('address.pagination_link', function ($trail) {
        $trail->parent('home');
        $trail->push('ที่อยู่', route('address'));
    });
    //Bills
    Breadcrumbs::for('bills', function ($trail) {
        $trail->parent('home');
        $trail->push('เพิ่มบิลค่าน้ำ', route('bills'));
    });
    Breadcrumbs::for('bills.showEdit', function ($trail) {
        $trail->parent('home');
        $trail->push('แก้ไขบิลน้ำ', route('bills.showEdit'));
    });
    Breadcrumbs::for('bills.dataEdit', function ($trail) {
        $trail->parent('bills.showEdit');
        $trail->push('บิลน้ำ', route('bills.dataEdit'));
    });
    //Reports
    Breadcrumbs::for('report.bills', function ($trail) {
        $trail->parent('home');
        $trail->push('เลือกเดือนปี', route('report.bills'));
    });
    Breadcrumbs::for('report.bills.report', function ($trail) {
        $trail->parent('report.bills');
        $trail->push('รีพอร์ตบิลน้ำ', route('report.bills.report'));
    });
    
?>