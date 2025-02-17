<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('UpdateTitle', ['name' => __('Stocksup') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.stocksup.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Stocksup')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Update') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="update" enctype="multipart/form-data">

        <div class="card-body">

            
            <!-- Name Input -->
            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'> {{ __('Name') }}</label>
                <input type='text' wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Notes Input -->
            <div class='form-group'>
                <label for='inputnotes' class='col-sm-2 control-label'> {{ __('Notes') }}</label>
                <textarea wire:model.lazy='notes' class="form-control @error('notes') is-invalid @enderror"></textarea>
                @error('notes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Type Input -->
            <div class='form-group'>
                <label for='inputtype' class='col-sm-2 control-label'> {{ __('Type') }}</label>
                <select wire:model.lazy="type" class="form-control @error('type') is-invalid @enderror" id='inputtype'>
                    <option value=""></option>
                    <option>شركة</option>
                    <option>قسم</option>
                </select>
                @error('type') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Update') }}</button>
            <a href="@route(getRouteName().'.stocksup.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
