<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Lab') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.lab.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Lab')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
            
            <!-- Patient_id Input -->
            <div class='form-group'>
                <label for='inputpatient_id' class='col-sm-2 control-label'>المريض</label>
                <input type="text" class="form-control" readonly value = "{{App\Models\Patient::find($patient_id)->name ??''}}">
                @error('patient_id') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Notes Input -->
            <div class='form-group'>
                <label for='inputnotes' class='col-sm-2 control-label'> {{ __('Notes') }}</label>
                <textarea wire:model.lazy='notes' class="form-control @error('notes') is-invalid @enderror"></textarea>
                @error('notes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
          
            <hr>

            @if(count($tests))

            @foreach($tests as $item)
                <a wire:click="$set('indexID', {{$loop->index}})"  class="btn  @if($indexID == $loop->index) btn-info @else btn-secondary @endif my-2" href="#select">{{$item['name']}} </a>
            @endforeach

            <table class="table table-bordered" dir="ltr">
                <thead>
                    <tr style="text-align:left">
                        <th>Test</th>
                        <th>Result</th>
                        <th>Unit</th>
                        <th>Normal Range</th>
                      
                    </tr>

                    @foreach($tests[$indexID]['items'] as $item)
                    <tr>
                        <th> {{$item['name']}} </th>
                        <th>

                        @if($item['result_type'] == "value")
                        <input type="text" class="form-control" wire:change = "updatekey({{$indexID}},{{$loop->index}},$event.target.value)">
                        @endif

                        @if($item['result_type'] == "select")

                        <select class="form-control"  wire:change = "updatekey({{$indexID}},{{$loop->index}},$event.target.value)">
                            <option value="">Select</option>
                            @foreach(json_decode($item['options']) as $sub)
                            <option value="{{$sub}}">{{$sub}}</option>

                            @endforeach
                        </select>

                     
                        
                        @endif

                        </th>
                        <th> {{$item['unit']}} </th>
                        <th>{{$item['normal_range']}}</th>
                
                    </tr>
                    @endforeach

                    
                    

                </thead>
            </table>
            @endif
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.lab.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
