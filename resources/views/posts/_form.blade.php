        @php
            $isCreate=!$post->exists;   
            $actionUrl=($isCreate)?'/posts':'/posts/'.$post->id;
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

        <form method="post" action="{{$actionUrl}}" enctype="multipart/form-data">  <!--使用post是因為真的要去資料庫建立一筆資料，action到store的路徑-->
        <!--上傳檔案都需要加上enctype="multipart/form-data"-->
        @csrf <!--連到post、put、delete這些比較危險的method時要做csrf token的驗證-->
            @if(!$isCreate)
                <input type="hidden" name="_method" value="put">
            @endif

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}"> <!--name之後會傳到後台做判斷--><!--改成edit的-->
            </div>
            <div class="form-group">
                <label class="d-block">Thumbnail</label>
                    @if($post->thumbnail)    <!--如果已有圖片，顯示出來-->
                        <img width="320" src="{{$post->thumbnail}}" alt="thumbnail">
                    @endif
                <div class="custom-file"> <!--上傳圖片-->
                    <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="category_id">
                    <option selected value>Please select a category</option>
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}" @if($post->category_id==$category->id) selected @endif>
                        {{$category->name}}
                        </option>
                    @endforeach         
                </select>
            </div>
            <div class="form-group">
                <label>Tags</label>
                <input type="text" class="form-control" name="tags" value="{{$post->tagsString()}}"> <!--name之後會傳到後台做判斷--> <!--改成edit的--> <!--呼叫Tag model裡的tagsString函數判斷是否已有tag，並將tag串聯回字串-->
            </div>
            <div class="form-group">
                <label>Content</label>
                <textarea class="form-control" name="content" id="" cols="80" rows="8">{{$post->content}}</textarea>  <!--改成edit的-->
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" onclick="window.history.back()">Cancel</button>  <!--用onclick塞javascript回到上一頁-->
        </form>