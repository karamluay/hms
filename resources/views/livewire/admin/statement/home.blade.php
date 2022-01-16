<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header p-0">
                <h3 class="card-title p-2">الكشوفات</h3>

                <div class="px-2 mt-4">

                    <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                        <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active">الكشوفات</li>
                    </ul>

                   
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12" >
                        
                            <label for="">الفترة</label>
                            <div class="input-group">
                                <input wire:ignore autocomplete="off" type="text" id="reportrange" onchange="daterangeGo()" class="form-control" wire:model.lazy="daterange">
                                <div class="input-group-append">
                                  
                                    @if($datefilterON)
                                    <button class="btn btn-danger" wire:click="$set('datefilterON',false)">
                                        الغاء
                                    </button>
                                    @endif

                                </div>
                                
                            </div>

                     
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>

                    @if($datefilterON)
                    <div class="col-md-6" x-data="{'modalIsOpen':false}">
                        <button @click.prevent="modalIsOpen = true" class="btn btn-info btn-block">
                            احتساب اجور الطبيب
                          
                           
                        </button>

                        <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                            <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false">
                                <h5 class="pb-2 border-bottom">اختيار الطبيب</h5>
                              
                                <select wire:model.lazy="doctor_id" class="form-control" >
                                    <option value="">اختيار الطبيب</option>
                                    @foreach(App\Models\User::where("user_type","doctor")->orWhere("user_type","resident")->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="mt-5 d-flex justify-content-between">
                                    <a target="_blank" href = "@route('doctorstatement')?id={{$doctor_id}}&daterange={{$daterange}}" class="text-white btn btn-success shadow">احتساب</a>
                                </div>
                            </div>

                          
                          
                        </div>

                        

                    </div>
                    <div class="col-md-6">
                        <a href = "@route('doctorhelper')?id={{$doctor_id}}&daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور مساعد الجراح</a>
                    </div>
                    <div class="col-md-6 py-2">
                        <a href = "@route('m5dr')?id={{$doctor_id}}&daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور الطبيب المخدر</a>

      
                    </div>
                    <div class="col-md-6 py-2">
                        <a href = "@route('m5drhelper')?id={{$doctor_id}}&daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور مساعد المخدر</a>
                    </div>

                    <div class="col-md-6 py-2">
                        <a href = "@route('qablat')?daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور القابلات</a>
                    </div>

                    <div class="col-md-6 py-2">
                        <a href = "@route('nurse')?daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور ممرضات العمليات</a>
                    </div>

                    <div class="col-md-6 py-2">
                        <a href = "@route('ambulance')?daterange={{$daterange}}" target="_blank" class="btn btn-info btn-block">احتساب اجور اسعاف طفل</a>
                    </div>

                    

                    

                    <div class="col-md-12 py-2">
                    <a href = "@route('hmsstatement')?daterange={{$daterange}}" target="_blank" class="btn btn-secondary btn-block">الميزانية</a>
                    </div>

                  

                    <div class="col-md-4 py-2">
                        <a href = "@route('expense')?daterange={{$daterange}}" target="_blank" class="btn btn-warning btn-block">احتساب المصاريف</a>
                    </div>

                    <div class="col-md-4 py-2">
                        <a href = "@route('doctorpays')?daterange={{$daterange}}" target="_blank" class="btn btn-warning btn-block">احتساب المدفوعات</a>
                    </div>

                    <div class="col-md-4 py-2">
                        <a href = "@route('income')?daterange={{$daterange}}" target="_blank" class="btn btn-warning btn-block">احتساب المقبوضات</a>
                    </div>

                    <div class="col-md-4" x-data="{'modalIsOpen':false}">
                        <button @click.prevent="modalIsOpen = true" class="btn btn-warning btn-block">
                            المقبوضات حسب التوجيه
                          
                           
                        </button>

                        <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                            <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false">
                                <h5 class="pb-2 border-bottom">اختيار التوجيه</h5>
                              
                                <select wire:model.lazy="stage" class="form-control" >
                                    <option value="">اختيار التوجيه</option>
                                    @foreach(App\Models\Stage::where("id","!=",5)->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="mt-5 d-flex justify-content-between">
                                    <a target="_blank" href = "@route('incomebystage')?stage={{$stage}}&daterange={{$daterange}}&type=doctor" class="text-white btn btn-success shadow">احتساب</a>
                                </div>
                            </div>

                          
                          
                        </div>

                        

                    </div>

                    <div class="col-md-4" x-data="{'modalIsOpen':false}">
                        <button @click.prevent="modalIsOpen = true" class="btn btn-warning btn-block">
                            المدفوعات حسب التوجيه
                          
                           
                        </button>

                        <div x-show="modalIsOpen" class="cs-modal animate__animated animate__fadeIn">
                            <div class="bg-white shadow rounded p-5" @click.away="modalIsOpen = false">
                                <h5 class="pb-2 border-bottom">اختيار التوجيه</h5>
                              
                                <select wire:model.lazy="stage" class="form-control" >
                                    <option value="">اختيار التوجيه</option>
                                    @foreach(App\Models\Stage::where("id","!=",5)->get() as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                                <div class="mt-5 d-flex justify-content-between">
                                    <a target="_blank" href = "@route('paybystage')?stage={{$stage}}&daterange={{$daterange}}" class="text-white btn btn-success shadow">احتساب</a>
                                </div>
                            </div>

                          
                          
                        </div>

                        

                    </div>

                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <h4>كشف المدفوعات حسب : </h4>
                        <select class="form-control" wire:model="payas">
                            <option value="">اختيار</option>
                            <option value="doctor">طبيب</option>
                            <option value="helper">مساعد جراح</option>
                            <option value="m5dr">مخدر</option>
                            <option value="m5drhelper">مساعد مخدر </option>
                            <option value="qabla">القابلة </option>
                            <option value="nurse">الممرضة</option>
                            <option value="ambulance">اسعاف طفل</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>

                    @if($payas == "doctor")
                   
                    <div class="col-md-12">
                        <select wire:model.lazy="by_doctor" class="form-control"  >
                            <option value="">اختيار الطبيب</option>
                            @foreach(App\Models\User::where("user_type","doctor")->orWhere("user_type","resident")->get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
               
                    @endif
                    <div class="col-md-12">
                        <a href = "@route('doctorpays')?daterange={{$daterange}}&doctor_id={{$by_doctor}}&payas={{$payas}}" target="_blank" class="btn btn-primary btn-block"> كشف المدفوعات </a>
                        
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function daterangeGo() {
        var element = document.getElementById("reportrange")
        console.log(element.value)
        Livewire.emit('searchBydate');
        @this.searchBydate(element.value)
    }
</script>
