<section id="basic-vertical-layouts">
    <div class="col-md-7">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible show fade">
            {{ session('status') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        @endif
    </div>
    <div class="row match-height">
        <div class="col-md-12 col-12">
            <section class="section">
                <div class="card ">
                    <div class="">
                        <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns ">
                            <div class="dataTable-top">

                        <div class="dataTable-search">
                        <form method="get" action="">
                             <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Tìm kiếm" name="search" value="{{request()->search}}" >
                                <button class="btn btn-primary"><i class="bi bi-search"></i></button>
                           </div>
                        </form>

                        </div></div>
                        <div class="dataTable-container">
                        <table class="table table-striped dataTable-table" id="table1">
                            <thead class="bg-primary text-white" >
                                <tr >
                                    <th data-sortable="" style="width: 30%;" class="text-center"><a href="#" >Bài viết</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Loại</a></th>
                                    <th data-sortable="" style="width: 10%;" class="text-center"><a href="#" >Danh mục</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Lượt xem</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Tác giả</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Người duyệt</a></th>
                                    <th data-sortable="" style="width: 10%;" class="text-center"><a href="#" >Thời gian duyệt</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Biên tập</a></th>
                                    <th data-sortable="" style="width: 10%;" class="text-center"><a href="#" >Xuất bản</a></th>
                                    <th data-sortable="" style="width: 5%;" class="text-center"><a href="#" >Chỉnh sửa lần cuối</a></th>
                                    <th data-sortable="" style="width: 10%;" class="text-center"><a href="#" >Thời gian tạo</a></th>
                                    <th data-sortable="" style="width: 10%;" class="text-center"><a href="#" >Action</a></th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($articles as $article)
                             <tr>
                                 <td>
                                     <div class="row">
                                         <div class="col-md-4"><img src="{{ $article->feature_image_path}}" title="aaaa" alt="" style="width:100%;height:80px; object-fit:cover;"></div>
                                         <div class="col-md-8">
                                             <div class="mb-1 fw-bold text-center"> {{ $article->title}}</div>
                                             @if ($article->breaking_news == 0)
                                                <span class="badge bg-danger text-center article_badge">Breaking</span>
                                             @endif

                                             @if ($article->feature_news == 0)
                                                <span class="badge bg-warning text-center article_badge">Feature</span>
                                             @endif

                                             @if ($article->recommended_news == 0)
                                             <span class="badge bg-info text-center article_badge">Recommended</span>
                                            @endif

                                        </div>
                                     </div>

                                </td>
                                 <td class=" fw-bold text-center">Article</td>
                                 <td  class="text-center">
                                    <span class="badge" style=" background-color :{{$article->category->color}}">{{$article->category->name}}</span>
                                 </td>
                                 <td class=" fw-bold text-center">{{ $article->views}}</td>
                                 <td class=" fw-bold text-center">{{ $article->admin->name}}</td>
                                 <td class=" fw-bold text-center">{{ $article->review_person_id}}</td>
                                 <td class=" fw-bold text-center">{{ $article->review_time}}</td>
                                 <td class=" fw-bold text-center">{{ $article->editor_id}}</td>
                                 <td class=" fw-bold text-center">{{ $article->published_time}}</td>
                                 <td class=" fw-bold text-center">{{ $article->updated_at->diffForHumans()}}</td>
                                 <td class=" fw-bold text-center">{{ $article->created_at}}</td>
                                 <td>

                                    <a href="{{ route('admin.articles.preview', ['id'=>$article->id]) }}" class="btn btn-info btn-sm mb-1"><i class="bi bi-list-ul"></i></a>
                                    <a href="{{ route('admin.articles.edit', ['id'=>$article->id]) }}" class="btn btn-warning btn-sm mb-1"><i class="bi bi-pencil-square"></i></a>
                                    <a data-url="{{ route('admin.articles.delete', ['id'=> $article->id]) }}" class="btn btn-danger btn-sm action_delete"><i class="bi bi-trash"></i></a>


                                 </td>


                             </tr>

                             @endforeach

                                  </tbody>
                        </table>
                    </div>
                    <div class="dataTable-bottom">
                        <div class="dataTable-info">Showing 1 to 10 of 26 entries</div>
                        <ul class="pagination pagination-primary float-end dataTable-pagination">
                            {{-- {{ $categories->links() }} --}}
                        </ul></div></div>
                    </div>
                </div>

            </section>
        </div>
    </div>
</section>
