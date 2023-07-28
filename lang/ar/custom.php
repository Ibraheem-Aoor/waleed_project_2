<?php

use App\Enums\BasePaymentStatusEnum;
use App\Enums\Phase\PhaseProgressStatusEnum;

return [
    'create_success'      =>      '✅ تم الإنشاء بنجاح',
    'update_success'      =>      '✅ تم التحديث بنجاح',
    'smth_wrong'      =>      '🔴 حدث خطأ ما',
    'has_projects'      =>      'هذا :object مرتبط بمشاريع',
    'deleted_successflly'      =>      '✅ تم الحذف بنجاح',
    'delete'    =>  'حذف',
    'confirm_delete'       =>      'هل انت متأكد من حذف ',
    'Caution'       =>      "🔊 انتباه",
    'Title'         =>      'عنوان',
    'Project No.'         =>      'رقم المشروع',
    'Project Name'         =>      'اسم المشروع',
    'Budget'         =>      'الميزانية',
    'Budget Amount'         =>      'قيمة الميزانية',
    'Budget Rate'         =>      'النسبة المئوية للميزانية',
    'status'         =>      'الحالة',
    'Actions'         =>      '🔧 خيارات',
    'Name'         =>      'الاسم',
    'Email'         =>      '📧 الإيميل',
    'password'         =>      'كلمة المرور',
    'Phone'         =>      '📞 الهاتف ',
    'phases'         =>      'المراحل',
    'new'         =>      'جديد',
    'Create New Phase'         =>      'إضافة مرحلة جديدة',
    'select'         =>      'اختر',
    'for_project'         =>      'للمشروع',
    'parent_phase'         =>      'المرحلة الرئيسية',
    'progress_status'         =>      'حالة التقدم',
    'payment_status'         =>      'حالة الدفع',
    'budget_not_accepted'         =>      'الميزانية غير مقبولة',
    'project_budget'            =>      'ميزانية المشروع',
    'admin' =>      'المسؤول',
    'ARCHPIX'   =>  'نظام التعهدات',
    'project_transactions'  =>  'معاملات المشروع',
    'close'     =>  'إغلاق',
    'create'    =>  'إنشاء',
    'amount'    =>  'المبلغ',
    'Land'    =>  'أرض',
    'Client'    =>  'العميل',
    'Consultant'    =>  'الاستشاري',
    'Contractor'    =>  'المقاول',
    'Delegator'    =>  'المندوب',
    'Land Area' =>  'منطقة الارض',
    'Land No' =>  'رقم الارض',
    'Consultant Total Budget'   =>  'اجمالي ميزانية الاستشاري',
    'Delegator Total Budget'   =>  'اجمالي ميزانية المندوب',
    'new_phase' =>  'مرحلة جديدة',
    'project_phases'    =>  'مراحل المشروع',
    'create_new_project'    =>  'انشاء مشروع جديد',
    'project_details'   =>  'تفاصيل المشروع',
    'Number'        =>  'رقم',
    'date'      =>      'تاريخ',
    'reports'  =>          'التقارير',




    // Sidebar
    'sidebar' => [
        'Dashboard' =>  'لوحة التحكم',
        'Consultants' =>  'المستشارين',
        'Clients' =>  'العملاء',
        'Contractor' =>  'المقاولون',
        'Delegator' =>  'المندوبون',
        'Projects' =>  'التعهدات',
        'delegate_transactions' =>  'معاملات المندوب',
        'tenders'   =>'المناقصات',
        'application_fees'  =>  'رسوم التقديم',

    ],


    'pdf'  => [
        'page_title'    =>  'للاستشارات الهندسية <span class="text-danger">نظام التعهدات</span>',
        'project_details'   =>  'بيانات المشروع',
        'project_phases'   =>  'مراحل المشروع',
        'total_paid'       =>   'إجمالي المدفوعات',
        'total'       =>   'الإجمالي',
        'total_left'       =>   'إجمالي المتبقي'
    ],

    'system_name'           =>      'نظام التعهدات',



    // Statuses Translations
    // BasePaymentStatusEnum::PAID => 'مدفوع',
    // BasePaymentStatusEnum::UNPAID => 'غير مدفوع',

    // PhaseProgressStatusEnum::COPMLETED => 'مكتمل',
    // PhaseProgressStatusEnum::IN_PROGRESS => 'قيد العمل',
    // PhaseProgressStatusEnum::PENDING => 'متوقفة',
];
