@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent
@endsection
@section('content')
<style type="text/css">
    #add_advertise{
        display: none;
    }
    #specs{
        position: relative;
    }
    #add_spec {
        display: inline;
        width: 50px;
        margin: auto 0;
        position: absolute;
        right: 0;
        top: 0;
    }
    #specs [class*="col-"] {
        margin: -5px auto;
    }
    .row div *{
        margin: 0.5em auto;
    }
</style>
        <form class="form" action="/advertises/add" method="post">
            <div class="row">
                <div class="col-md-12">
                    <input type="text" name="title" id="title" class="form-control" placeholder="Enter title here..." minlength="6">
                    <select class="form-control" id="category" name="category">
                        <optgroup>
                            <option selected="">Please select a category</option>
                        </optgroup>
                        <optgroup>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                        </optgroup>
                    </select>
                    <div class="row">
                        <div class="col-md-12" id="specs">
                            <h4 style="display: inline;">Specs</h4>
                            <a id="add_spec" onclick="addSpecRow()" href="#"><span class="material-icons">note_add</span></a>
                            <div class="row spec">
                                <div class="col-md-5">
                                    <input type="text" name="spec_title[]" class="form-control" placeholder="Spec">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="spec_value[]" class="form-control" placeholder="Value">
                                </div>
                                <div class="col-md-1"></div>
                            </div>
                        </div>
                    </div>
                    <input type="decimal" name="amount" id="amount" class="form-control" placeholder="Enter amount here...">
                    <textarea class="form-control" name="note" id="note" placeholder="Enter note here..."></textarea>
                </div>
                <div class="col-md-12">
                    <div class="btns-group">
                        <button class="btn btn-primary" type="submit">Save</button>
                        <button class="btn btn-warning" type="reset">Clear</button>
                    </div>
                </div>
            </div>
            {{ csrf_field() }}
        </form>
        <script type="text/javascript">
            function addSpecRow(){
                var row = document.createElement('div')
                row.className = "row spec";

                var ch1 = document.createElement('div')
                ch1.className = "col-md-5"
                var spec_title = document.createElement('input');
                spec_title.className = "form-control"
                spec_title.placeholder = "Spec"
                spec_title.name = "spec_title[]";
                ch1.appendChild(spec_title)
                row.appendChild(ch1)

                var ch2 = document.createElement('div')
                ch2.className = "col-md-6"
                var spec_value = document.createElement('input');
                spec_value.className = "form-control"
                spec_value.placeholder = "Value"
                spec_value.name = "spec_value[]";
                ch2.appendChild(spec_value)
                row.appendChild(ch2)

                var ch3 = document.createElement('div')
                ch3.className = "col-md-1"
                var action = document.createElement('a');
                action.onclick = e => {
                    console.log(e.target.parentElement)
                    console.log(e.target.parentElement.parentElement)
                    e.target.parentElement.parentElement.parentElement.remove();
                }
                action.className = "remove-spec"
                action.href = "#";

                var icon = document.createElement('span');
                icon.className = "material-icons"
                icon.innerText = "remove";

                action.appendChild(icon)

                ch3.appendChild(action)

                row.appendChild(ch3)
                document.querySelector('#specs').appendChild(row)
            }

            function removeSpecRow(e){
                console.log('e', e)
                //const e = e//document.querySelector('#remove_spec');
                if (e.parentElement/*.parentElement*/)
                    e/*.parentElement*/.parentElement?.remove();
            }
        </script>
    @endsection