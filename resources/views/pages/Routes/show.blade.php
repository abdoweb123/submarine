<!-- show_modal_station -->
<div class="modal fade" id="show{{ $item->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    عرض بيانات المكتب
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">الاسم باللغة العربية ::</label>
                            <input id="Name" type="text" name="Name" class="form-control" value="{{ $item->getTranslation('name', 'ar') }}" readonly>
                            <input id="id" type="hidden" name="id" class="form-control" value="{{ $item->id }}">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">الاسم باللغة الإنجليزية ::</label>
                            <input type="text" class="form-control" value="{{ $item->getTranslation('name', 'en') }}" name="name_en" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="city_id" class="mr-sm-2">اسم المدينة التابع لها : :</label>
                            <input type="text" class="form-control" value="{{ $item->city->name }}" readonly>
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">مدخل البيانات:</label>
                            <input type="text" class="form-control" value="{{ auth('admin')->user()->name }}" name="name_en" readonly>
                        </div>
                    </div>
                    <br><br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                    </div>
            </div>
        </div>
    </div>
</div>
