        @php
            $isCreate=!$category->exists;   
            $actionUrl=($isCreate)?'/categories':'/categories/'.$category->id;
        @endphp
        <!--$isCreate=request()->is('*create'); -->
        <!--request在laravel裡是全域的function，可以在不同檔案呼叫他，並判斷路徑是否已create做結尾-->

        <!--若表單驗證出現問題，傳回錯誤訊息的位置-->
        @if($errors->any())    <!--用any確認是否有錯誤訊息-->
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $key=>$error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="post" action="{{$actionUrl}}">  <!--使用category是因為真的要去資料庫建立一筆資料，action到store的路徑-->
            @csrf <!--連到category、put、delete這些比較危險的method時要做csrf token的驗證-->
            @if(!$isCreate)
                <input type="hidden" name="_method" value="put">
            @endif

            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$category->name}}"> <!--name之後會傳到後台做判斷--><!--改成edit的-->
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>  <!--用onclick塞javascript回到上一頁-->
        </form>