<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Patient') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{
                        __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.patient.read')"
                        class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Patient')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">



        <div class="card-body">

            <div class="row">
                <div class="col-md-4">
                    <!-- Name Input -->
                    <div class='form-group'>
                        <label for='inputname' class='control-label'> {{ __('Name') }}</label>
                        <input type='text' wire:model.lazy='name'
                            class="form-control @error('name') is-invalid @enderror" id='inputname'>
                        @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- Gender Input -->
                    <div class='form-group'>
                        <label for='inputgender' class='control-label'> {{ __('Gender') }}</label>

                        <select wire:model="gender" class="form-control">
                            <option value=""></option>

                            <option>ذكر</option>
                            <option>انثى</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <!-- Phone Input -->
                    <div class='form-group'>
                        <label for='inputphone' class='control-label'> {{ __('Phone') }}</label>
                        <input type='text' wire:model.lazy='phone'
                            class="form-control @error('phone') is-invalid @enderror" id='inputphone'>
                        @error('phone') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">

                    <div class='form-group'>
                        <label for='inputphone' class='control-label'> {{ __('العمر') }}</label>
                        <input type='number' wire:model.lazy='age' 
                            class="form-control @error('phone') is-invalid @enderror" id='inputphone'>
                        @error('age') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class='form-group'>
                        <label for='inputimage' class='control-label'> {{ __('Image') }}</label>
                        <input type='file' wire:model='image'
                            class="form-control-file @error('image') is-invalid @enderror" id='inputimage'>
                        @if($image and !$errors->has('image') and $image instanceof \Livewire\TemporaryUploadedFile and
                        (in_array( $image->guessExtension(), ['png', 'jpg', 'gif', 'jpeg'])))
                        <a href="{{ $image->temporaryUrl() }}"><img width="200" height="200" class="img-fluid shadow"
                                src="{{ $image->temporaryUrl() }}" alt=""></a>
                        @endif
                        @error('image') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>










            <div class='form-group'>
                <label for='inputmusicname' class='control-label'> {{ __('Direction') }}</label>

                <select required wire:model="status" class="form-control">
                    <option value=""></option>
                    @foreach(App\Models\Stage::get() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>


            </div>

            @if($status !="5" && $status)
            <div class="col-md-6">
                 
            
              <div class='form-group'>
                  <label for='inputdoctor_id' class=' control-label'>الطبيب</label>
                  
                  <select class="form-control" data-live-search="true" wire:model="redirect_doctor_id">
                      <option value="">يرجى اختيار طبيب</option>
                      @foreach(App\Models\User::where('user_type','resident')->orWhere("user_type","doctor")->get() as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>

                      @endforeach
                  </select>
                  
              </div>
          </div>
          
            @endif


            @if($status == "5")
                
            <div class="row">
                <div class="col-md-12">
                    <label>المريض محول ام لا</label>
                    <select type="text" class="form-control" wire:model.lazy="hms_nsba">
                        <option value="60">نعم</option>
                        <option value="40">لا</option>
                </select>

                </div>
                <div class="col-md-12 py-2">
                    <h3 class="px-2">المعلومات الشخصية</h3>
                    <hr>
                </div>
                <div class="col-md-3">
                    <div class='form-group'>
                        <label class='control-label'> {{ __('الوظيفة') }}</label>
                        <input type='text' wire:model.lazy='job'
                            class="form-control @error('job') is-invalid @enderror">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group'>
                        <label class=' control-label'> {{('أسم الزوج/ة') }}</label>
                        <input type='text' required wire:model.lazy='husbandname'
                            class="form-control @error('name') is-invalid @enderror">

                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group'>
                        <label class=' control-label'> {{('اسم الام الثلاثي') }}</label>
                        <input required type='text' wire:model.lazy='mother'
                            class="form-control @error('name') is-invalid @enderror">

                    </div>
                </div>


                <div class="col-md-3">
                    <div class='form-group'>
                        <label for='inputname' class='control-label'> {{ __('الجنسية') }}</label>
                        <input required type='text' wire:model.lazy='Nationality'
                            class="form-control @error('Nationality') is-invalid @enderror">

                    </div>
                </div>
                <div class="col-md-12">
                    <div class='form-group'>
                        <label for='inputname' class=' control-label'> {{('عنوان السكن') }}</label>
                        <input type='text' wire:model.lazy='adress'
                            class="form-control @error('adress') is-invalid @enderror">
                        @error('adress') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <h3>دائرة الاحوال</h3>
                    <hr>
                </div>

                <div class="col-md-3">
                    <div class='form-group'>
                        <label class='control-label'> {{ __('الدائرة') }}</label>
                        <input type='text' wire:model.lazy='identity_circule'
                            class="form-control @error('identity_circule') is-invalid @enderror">
                        @error('identity_circule') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group'>
                        <label class=' control-label'> {{('رقم الصحيفة') }}</label>
                        <input type='text' wire:model.lazy='identity_page'
                            class="form-control @error('identity_page') is-invalid @enderror">
                        @error('identity_page') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group'>
                        <label class=' control-label'> {{('السجل') }}</label>
                        <input type='text' wire:model.lazy='identity_book'
                            class="form-control @error('identity_book') is-invalid @enderror">
                        @error('identity_book') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-3">
                    <div class='form-group'>
                        <label class=' control-label'> {{('رقم الهوية') }}</label>
                        <input type='text' wire:model.lazy='identity_number'
                            class="form-control @error('identity_number') is-invalid @enderror">
                        @error('identity_number') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>



                <div class="col-md-4">
                    <div class='form-group'>
                        <label class='control-label'> {{ __('رقم البطاقة الموحدة') }}</label>
                        <input type='text' wire:model.lazy='idSingle'
                            class="form-control @error('idSingle') is-invalid @enderror">
                        @error('idSingle') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='form-group'>
                        <label class=' control-label'> {{('تاريخ الأنتهاء') }}</label>
                        <input  type='date' wire:model.lazy='iddate' 
                            class="form-control @error('iddate') is-invalid @enderror">
                        @error('iddate') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class='form-group'>
                        <label class=' control-label'> {{('جهة الأصدار') }}</label>
                        <input type='text' wire:model.lazy='idcreatejeha'
                            class="form-control @error('idcreatejeha') is-invalid @enderror">
                        @error('idcreatejeha') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>


                <div class="col-md-12">
                    <h3>معلومات دخول المستشفى</h3>
                    <hr>

                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>الطابق</label>
                        <select required wire:model="floor" class="form-control">
                            <option value="">اختر الطابق</option>
                            <option value="2">الطابق الثاني</option>
                            <option value="3">الطابق الثالث</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>الغرفة <a wire:loading wire:target="floor"><i
                                    class="fas fa-spinner fa-spin"></i></a></label>

                        <select required wire:model="room_id" class="form-control">
                            <option value="">اختر الغرفة</option>
                            @foreach(App\Models\Room::where("floor",$floor)->get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="col-sm">
                        <div class='form-group'>
                            <label class=' control-label'> {{('الطبيب المعالج') }}</label>
                            <select required wire:model.lazy="doctor_id" class="form-control">
                                <option value="">اختيار الطبيب</option>
                                @foreach(App\Models\User::where("user_type","doctor")->get() as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class='form-group'>
                        <label class='control-label'> {{ __('نوع العملية') }}</label>
                        <select class="form-control" wire:model.lazy='opration_id'>
                            <option value="">اختيار العملية</option>
                            @foreach(App\Models\Operation::get() as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>


                    </div>
                </div>

                <div class="col-md-6">
                    <div class='form-group'>
                        <label class=' control-label'> {{('تاريخ الدخول') }}</label>
                        <input type='date' wire:model.lazy='inter_at' 
                            class="form-control @error('inter_at') is-invalid @enderror">
                        @error('inter_at') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class='form-group'>
                        <label class=' control-label'> {{('المرافق') }}</label>
                        <input type='text' wire:model.lazy='relaitve_name'
                            class="form-control @error('relaitve_name') is-invalid @enderror">
                        @error('relaitve_name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class='form-group'>
                        <label class=' control-label'> {{('رقم تلفون المرافق') }}</label>
                        <input type='text' wire:model.lazy='relaitve_phone'
                            class="form-control @error('relaitve_phone') is-invalid @enderror">
                        @error('relaitve_phone') <div class='invalid-feedback'>{{ $message }}</div> @enderror
                    </div>
                </div>

                <style>
                    .wrapper {
  position: relative;
  width: 400px;
  height: 200px;
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.signature-pad {
  position: absolute;
  left: 0;
  top: 0;
  width:400px;
  height:200px;
  background-color: white;
}
                </style>

                <div class="col-md-6">
                    <label for="">توقيع المريض</label>
           
                   
                </div>
                

            </div>



            @endif
            
            <canvas style="@if($status != '5')display: none;@endif" id="sig" ></canvas>
            <a style="@if($status != '5')display: none;@endif" class="btn btn-info" href="#clearsig"  id="clearsig">حذف التوقيع</a>
            
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.patient.read')" class="btn btn-default float-left">{{ __('Cancel')
                }}</a>
        </div>
    </form>
</div>


