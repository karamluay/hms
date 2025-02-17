<div class="card">
    <div class="card-header p-0">
        <h3 class="card-title">{{ __('CreateTitle', ['name' => __('Employee') ]) }}</h3>
        <div class="px-2 mt-4">
            <ul class="breadcrumb mt-3 py-3 px-4 rounded" style="background-color: #e9ecef!important;">
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.home')" class="text-decoration-none">{{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="@route(getRouteName().'.employee.read')" class="text-decoration-none">{{ __(\Illuminate\Support\Str::plural('Employee')) }}</a></li>
                <li class="breadcrumb-item active">{{ __('Create') }}</li>
            </ul>
        </div>
    </div>

    <form class="form-horizontal" wire:submit.prevent="create" enctype="multipart/form-data">

        <div class="card-body">
        
            <div class="form-group">
                <label for="">القسم</label>
                <select class="form-control @error('category_id') is-invalid @enderror" wire:model="category_id">
                    <option value="">اختيار القسم</option>
                    @foreach(App\Models\EmpCategory::all() as $empcategory)
                        <option value="{{ $empcategory->id }}">{{ $empcategory->name }}</option>
                    @endforeach
                </select>

            </div>

            <!-- Name Input -->
            <div class='form-group'>
                <label for='inputname' class='col-sm-2 control-label'> {{ __('Name') }}</label>
                <input type='text' wire:model.lazy='name' class="form-control @error('name') is-invalid @enderror" id='inputname'>
                @error('name') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Salary Input -->
            <div class='form-group'>
                <label for='inputsalary' class='col-sm-2 control-label'> {{ __('Salary') }}</label>
                <input type='number' wire:model.lazy='salary' class="form-control @error('salary') is-invalid @enderror" id='inputsalary'>
                @error('salary') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
            <!-- Notes Input -->
            <div class='form-group'>
                <label for='inputnotes' class='col-sm-2 control-label'> {{ __('Notes') }}</label>
                <input type='text' wire:model.lazy='notes' class="form-control @error('notes') is-invalid @enderror" id='inputnotes'>
                @error('notes') <div class='invalid-feedback'>{{ $message }}</div> @enderror
            </div>
            
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-info ml-4">{{ __('Create') }}</button>
            <a href="@route(getRouteName().'.employee.read')" class="btn btn-default float-left">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
