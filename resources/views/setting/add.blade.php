@extends('layouts.app')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="row">
                <div class="col-md-1">
                </div>
                <div class="col-md-11">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success">
                            <span
                                class="font-medium">Success Alert! &nbsp; {{\Illuminate\Support\Facades\Session::get('success')}}</span>
                        </div>
                    @endif

                    @if(\Illuminate\Support\Facades\Session::has('warning'))
                        <div class="alert alert-danger">
                            <span
                                class="font-medium">Warning Alert!{{\Illuminate\Support\Facades\Session::get('warning')}}</span>
                        </div>
                    @endif

                    <div class="panel panel-default">

                        <div style="float: right; padding-top: 10px; padding-right:10px">
                            <a href="" type="button" data-toggle="modal" data-target="#exampleModal"
                                    class="panel-title btn btn-purple waves-effect waves-light">Update Setting &nbsp<i
                                    class="fa-solid fa-user-plus"></i>
                            </a>
                        </div>


                        <div class="panel-heading">

                            <x-header.header-component title="All Settings"/>

                        </div>


                        <div class="panel-body">

                            <x-setting.Setting-Form-Component method="post" action="{{route('settings.store')}}" enctype="multipart/form-data">
                                <div class="form-group">
                                    <x-setting.setting-label for="sight_title" value="Sight Title"></x-setting.setting-label>
                                    <x-setting.setting-input type="text" name="sight_title" placeholder="Sight Name...."></x-setting.setting-input>
                                </div>
                                <div class="form-group">
                                    <x-setting.setting-label for="sight_sub_title" value="Sight Sub Title"></x-setting.setting-label>
                                    <x-setting.setting-input type="text" name="sight_sub_title" placeholder="Sight Sub Title Name...."></x-setting.setting-input>
                                </div>
                                <div class="form-group">
                                    <x-setting.setting-label for="company_address" value="Company Address"></x-setting.setting-label>
                                    <x-setting.setting-input type="text" name="company_address" placeholder="Company Address...."></x-setting.setting-input>
                                </div>
                                <div class="form-group">
                                    <x-setting.setting-label for="sight_logo" value="Sight Logo"></x-setting.setting-label>
                                    <x-setting.setting-input type="file" accept="image/*" name="sight_logo" id="sight_logo " onchange="readUrl(this)"></x-setting.setting-input>
                                    <img id="image" src="#" alt=""/>
                                </div>
                                <div class="mt-1">
                                    <x-setting.setting-button>Submit</x-setting.setting-button>
                                </div>
                            </x-setting.Setting-Form-Component>

                        </div>
                    </div>
                </div>
                <!-- panel-body -->
            </div> <!-- panel -->
        </div>
    </div>

    <script>
        function readUrl(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
