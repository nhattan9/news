<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Article;
use App\Category;
use App\Components\Recusive;
use App\Http\Requests\ArticleAddRequest;
use App\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminArticleController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $article;
    private $tag;

    public function __construct(){
        $this->category = new Category();
        $this->article = new Article();
        $this->tag = new Tag();
    }
    public function index()
    {
        $articles = $this->article->latest()->where('draff',1)->paginate(10);
        $headers=[
            ['name'=>'Bài viết','sort'=>'dataTable-sorter','width'=>'30%'],
            ['name'=>'Loại','width'=>'5%'],
            ['name'=>'Danh mục','width'=>'10%'],
            ['name'=>'Lượt xem','width'=>'5%'],
            ['name'=>'Tác giả','width'=>'5%'],
            ['name'=>'Người duyệt','width'=>'5%'],
            ['name'=>'Thời gian duyệt','width'=>'10%'],
            ['name'=>'Biên tập','width'=>'5%'],
            ['name'=>'Xuất bản','width'=>'10%'],
            ['name'=>'Chỉnh sửa lần cuối','width'=>'5%'],
            ['name'=>'Thời gian tạo','width'=>'10%'],
            ['name'=>'Action','width'=>'5%'],
        ];
        return view('admin.article.index',compact('articles','headers'));
    }
    public function getCategory($parent_id)
    {
        $data = $this->category->get();
        $recusive = new Recusive($data);
        $htmlOptions = $recusive->CategoryRecusive($parent_id);
        return $htmlOptions;
    }
    public function create()
    {
        $htmlOptions = $this->getCategory($parent_id="");
        $tags = $this->tag->get();
        return view('admin.article.add',compact('htmlOptions','tags'));

    } 
    public function store(ArticleAddRequest $request)
    {

      
        try {
           DB::beginTransaction();
           $dataArtcleUpdate = [
            'title' => $request->title,
            'slug' => (($request->slug) ?? Str::slug($request->title,'-').'-'.rand(100000,100000000000)),
            'summary' => $request->summary,
            'category_id' => $request->category_id,
            'content' => $request->content,
            'keywords' => $request->keywords,
            'active' => ($request->active == 'on' ) ? 0 : 1,
            'feature_news' => ($request->feature == 'on' ) ? 0 : 1,
            'breaking_news' => ($request->breaking == 'on' ) ? 0 : 1,
            'recommended_news' => ($request->recommended == 'on' ) ? 0 : 1,
            'author_id' => auth()->id(),
           ];

           $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'article');
           if (!empty($dataUploadFeatureImage)) {
               $dataArtcleUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
               $dataArtcleUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
           }
           
           

            if($request->has('submit')){
                $article = $this->article->create( $dataArtcleUpdate );
            }elseif ($request->has('draft')) {
                $dataArtcleUpdate['draff']=0;
                $article = $this->article->create( $dataArtcleUpdate );
            }

           //Insert Tags Table
           $tagIds = [];
           if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            //insert product_tags
            $article->tags()->attach($tagIds);
           DB::commit();
           return redirect()->back();

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('---Message :' . $exception->getMessage() . '---Line:' .$exception->getLine());
        }

      
    }

    public function preview($id)
    {
        $article = $this->article->find($id);
        return view('admin.article.preview',compact('article'));
    }
    public function edit($id)
    {
        $article = $this->article->find($id);
        $htmlOptions = $this->getCategory($article->category_id);
        $tags = $this->tag->get();
        $tagSelected = $article->tags;
        return view('admin.article.edit',compact('article','htmlOptions','tagSelected','tags'));

        
    }
    public function update($id,ArticleAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataArtcleUpdate = [
             'title' => $request->title,
             'slug' => ($request->slug) ?? Str::slug($request->title,'-'),
             'summary' => $request->summary,
             'category_id' => $request->category_id,
             'content' => $request->content,
             'keywords' => $request->keywords,
             'active' => ($request->active == 'on' ) ? 0 : 1,
             'feature_news' => ($request->feature == 'on' ) ? 0 : 1,
             'breaking_news' => ($request->breaking == 'on' ) ? 0 : 1,
             'recommended_news' => ($request->recommended == 'on' ) ? 0 : 1,
             'author_id' => auth()->id(),
            ];
 
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'article');
            if (!empty($dataUploadFeatureImage)) {
                $dataArtcleUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                $dataArtcleUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            }
            
            
 
             if($request->has('submit')){
                 $dataArtcleUpdate['draff']=1;
                 $this->article->find($id)->update( $dataArtcleUpdate );
             }elseif ($request->has('draft')) {
                 $dataArtcleUpdate['draff']=0;
                 $this->article->find($id)->update( $dataArtcleUpdate );
             }
             $article = $this->article->find($id);
 
            //Insert Tags Table
            $tagIds = [];
            if (!empty($request->tags)) {
                 foreach ($request->tags as $tagItem) {
                     $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                     $tagIds[] = $tagInstance->id;
                 }
             }
             //insert product_tags
             $article->tags()->sync($tagIds);
            DB::commit();
            return redirect()->route('admin.articles.preview', ['id' => $id]);
 
         } catch (\Exception $exception) {
             DB::rollBack();
             Log::error('---Message :' . $exception->getMessage() . '---Line:' .$exception->getLine());
         }
    }
  public function articleFormat()
  {
     return view('admin.article.article_format');
  }
  public function delete($id) {
    try {
        $this->article->find($id)->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    } catch (\Exception $exception) {
        Log::error('Message:' . $exception->getMessage() . 'Line:' . $exception->getLine());
        return response()->json([
            'code' => 500,
            'message' => 'fail'
        ], 500);
    }
  }

  public function myArticle()
  {

    $articles=$this->article->latest()->where('author_id',Auth::guard('admin')->user()->id)
                                      ->where('draff',1)
                                      ->get();
    $draffs=$this->article->latest()->where('author_id',Auth::guard('admin')->user()->id)
    ->where('draff',0)
    ->get();
      return view('admin.article.myArticle',compact('articles','draffs'));

  }
}