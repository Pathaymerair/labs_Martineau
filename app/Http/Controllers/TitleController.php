<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Icon;
use App\Service;
use App\Project;
use App\Testimonial;
use ImageIntervention;
use App\User;
use App\ImageUser;
use App\Role;
use App\Instagram;
use App\Tag;
use App\Categorie;
use App\Post;
use App\Comment;
use Storage;
use App\Carousel;

use Mapper;
use App\Http\Requests\EditHomeRequest;
use App\Http\Requests\EditServicesRequest;
use App\Http\Requests\EditBlogRequest;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\EditContactRequest;

class TitleController extends Controller
{
    public function index(){
        $titles = Title::all();
        $carousels = Carousel::all();
        $services = service::with('icon')->get();
        $testimonials = Testimonial::all();
        $services = Service::Paginate(9);
        $users = User::where('state_id', 2)->get();
        $roles = Role::all();
        $admin = User::where('role_id', 1)->get();
        $imageUsers = ImageUser::all();
        do {
            $user = $users->except('role_id', 1)->random();
            $userDeux = $users->except('role_id', 1)->random();
        } while ($user->imageUser && $userDeux->imageUser && $userDeux == $user);
        // do {
        // } while ( && $userDeux != [$admin]);
        $serviceUn = $services->random();
        $serviceDeux = $services->random();
        $serviceTrois = $services->random();
     
        return view('welcome', compact('titles', 'icons', 'services', 'testimonials', 'users', 'user', 'imageUser', 'userDeux', 'serviceUn', 'serviceDeux', 'serviceTrois', 'carousels'));
    }

    public function indexBlog(){
        $titles = Title::all();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();      
        $posts = Post::where('state_id',2)->orderBy('id', 'desc')->paginate(3);
        $comment = Comment::with('post')->where('state_id', 2)->get();

        return view('blog', compact('titles', 'instas', 'categories', 'tags', 'posts', 'comment'));
    }
    public function indexServices(){
        $titles = Title::all();
        $services = service::with('icon')->get();
        $projects = Project::orderBy('id', 'desc')->take(6)->get();
        $group = $projects->split(2);
       


        // $projectss = Project::orderBy('id', 'desc')->take(6)->get();
      
        $services = Service::paginate(9);
        return view('services', compact('titles', 'services', 'projects', 'group'));
    }
    public function indexContact(){
        $titles = Title::all();
        Mapper::map(50.8548661, 4.3385079);
        return view('contact', compact('titles'));
    }
    public function edit(){
        $titles = Title::all();
        $users = User::where('state_id', 2)->get();
        $userAdmin = User::where('role_id', 1)->get();
        $imageUsers = ImageUser::all();
        do {
            $user = $users->random();
            $userDeux = $users->random();
        } while (!$user->imageUser && !$userDeux->imageUser && $userDeux != $user);

        return view('pages.editSite', compact('titles', 'users', 'user', 'userDeux', 'userAdmin'));
    }

    public function update(EditHomeRequest $request, $id){
        $title = Title::find($id);
        if ($request->file('logo')){

            $images= $request->file('logo');
              
            $filenamethumb = time().'thumb'.$images->hashName();
            $filename = time().$images->hashName();
            
            $resized = ImageIntervention::make($images)->resize(120, 40);
            $resized->save('img/logos/thumb/'.$filenamethumb);
    
            $resize = ImageIntervention::make($images)->resize(510,150);
            $resize->save('img/logos/nm/'.$filename);
            
          
            $title->bigLogo = $filename;
            $title->logo = $filenamethumb;
      
        }  
        $title->slogan = $request->slogan;
        $title->introSlogan = $request->introSlogan;
        $title->overIntroSlogan = $request->overIntroSlogan;
        $title->introSloganDeux = $request->introSloganDeux;
        $title->introUn = $request->introUn;
        $title->introDeux = $request->introDeux;
        $title->introButton = $request->introButton;
        $title->youtubeLink = $request->youtubeLink;
        $title->testiTitle = $request->testiTitle;
        $title->servicesTitle = $request->servicesTitle;
        $title->overServicesTitle = $request->overServicesTitle;
        $title->servicesTitleDeux = $request->servicesTitleDeux;
        $title->servicesButton = $request->servicesButton;
        $title->teamTitle = $request->teamTitle;
        $title->overTeamTitle = $request->overTeamTitle;
        $title->teamTitleDeux = $request->teamTitleDeux;
        $title->promoTitle = $request->promoTitle;
        $title->promoDesc = $request->promoDesc;
        $title->promoButton = $request->promoButton;
        if ($request->userAdmin){
            $title->user_id = $request->userAdmin;
        } else {
            $title->user_id = $title->user_id;
        }
      



        $title->placeholderName = $request->placeholderName;
        $title->placeholderMail = $request->placeholderMail;
        $title->placeholderSubject = $request->placeholderSubject;
        $title->placeholderMsg = $request->placeholderMsg;
        $title->mailButton = $request->mailButton;
        $title->contactTitle = $request->contactTitle;
        $title->contactDesc = $request->contactDesc;
        $title->contactInfo = $request->contactInfo;
        $title->contactAdress = $request->contactAdress;
        $title->contactAdressDeux = $request->contactAdressDeux;
        $title->contactPhone = $request->contactPhone;
        $title->contactMail = $request->contactMail;
        $title->copyright = $request->copyright;
        $title->copyrightName = $request->copyrightName;
        $title->save();
        return redirect('editSite')->with('success', 'Content updated !');
    }
    public function editServices(){
        $titles = Title::all();
        return view('pages.editServices', compact('titles'));
    }
    public function updateService(EditServicesRequest $request, $id){

        $title = Title::find($id);
        $title->servicesPage = $request->servicesPage;
        $title->homeRef = $request->homeRef;
        $title->servicesRef = $request->servicesRef;
        $title->servicesTitle = $request->servicesTitle;
        $title->overServicesTitle = $request->overServicesTitle;
        $title->servicesTitleDeux = $request->servicesTitleDeux;
        $title->servicesButton = $request->servicesButton;
        $title->introSlogan = $request->introSlogan;
        $title->overIntroSlogan = $request->overIntroSlogan;
        $title->introSloganDeux = $request->introSloganDeux;

        $title->introButton = $request->introButton;
        $title->newsletterTitle = $request->newsletterTitle;
        $title->newsletterPlaceholder = $request->newsletterPlaceholder;
        $title->newsletterButton = $request->newsletterButton;
        $title->placeholderName = $request->placeholderName;
        $title->placeholderMail = $request->placeholderMail;
        $title->placeholderSubject = $request->placeholderSubject;
        $title->placeholderMsg = $request->placeholderMsg;
        $title->mailButton = $request->mailButton;
        $title->contactTitle = $request->contactTitle;
        $title->contactDesc = $request->contactDesc;
        $title->contactInfo = $request->contactInfo;
        $title->contactAdress = $request->contactAdress;
        $title->contactAdressDeux = $request->contactAdressDeux;
        $title->contactPhone = $request->contactPhone;
        $title->contactMail = $request->contactMail;
        $title->copyright = $request->copyright;
        $title->copyrightName = $request->copyrightName;
        $title->save();
        return redirect('editServices')->with('success', 'Content updated !');

    }

    public function editBlog(){
        $titles = Title::all();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();      
        $posts = Post::where('state_id',2)->orderBy('id', 'desc')->paginate(3);
        $comment = Comment::with('post')->where('state_id', 2)->get();
        return view('pages.editBlog', compact('titles', 'instas', 'categories', 'tags', 'posts', 'comments'));
    }

    public function updateBlog(EditBlogRequest $request, $id){

        $title = Title::find($id);
        if ($request->file('addImage')){
            Storage::delete('/img/add/nm/'.$title->addImage);
            
            $images= $request->file('addImage');
            $filename = time().$images->hashName();
            $resize = ImageIntervention::make($images);
            $resize->save('img/add/nm/'.$filename);
            $title->addImage = $filename;
        }
        $title->blogPage = $request->blogPage;
        $title->homeRef = $request->homeRef;
        $title->blogRef = $request->blogRef;
        $title->searchPlaceholder = $request->searchPlaceholder;
        $title->categoriesTitle = $request->categoriesTitle;
        $title->instaTitle = $request->instaTitle;
        $title->tagsTitle = $request->tagsTitle;
        $title->quoteTitle = $request->quoteTitle;
        $title->quoteDesc = $request->quoteDesc;
        $title->addTitle = $request->addTitle;
        $title->newsletterTitle = $request->newsletterTitle;
        $title->newsletterPlaceholder = $request->newsletterPlaceholder;
        $title->newsletterButton = $request->newsletterButton;
        $title->copyright = $request->copyright;
        $title->copyrightName = $request->copyrightName;
        $title->save();
        return redirect('editBlog')->with('success', 'Content updated !');

    }

    public function editContact(){
        $titles = Title::all();
        return view('pages.editContact', compact('titles'));
    }

    public function updateContact(EditContactRequest $request, $id){
        $title = Title::find($id);
        $title->contactPage = $request->contactPage;
        $title->homeRef = $request->homeRef;
        $title->contactRef = $request->contactRef;
        $title->placeholderName = $request->placeholderName;
        $title->placeholderMail = $request->placeholderMail;
        $title->placeholderSubject = $request->placeholderSubject;
        $title->placeholderMsg = $request->placeholderMsg;
        $title->mailButton = $request->mailButton;
        $title->contactTitle = $request->contactTitle;
        $title->contactDesc = $request->contactDesc;
        $title->contactInfo = $request->contactInfo;
        $title->contactAdress = $request->contactAdress;
        $title->contactAdressDeux = $request->contactAdressDeux;
        $title->contactPhone = $request->contactPhone;
        $title->contactMail = $request->contactMail;
        $title->copyright = $request->copyright;
        $title->copyrightName = $request->copyrightName;
        $title->save();
        return redirect('editContact')->with('success', 'Content updated !');

    }

    public function search(SearchRequest $request){
        $titles = Title::find(1)->first();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();      
        $posts = Post::where('state_id',2)->orderBy('id', 'desc')->paginate(3);
        $comment = Comment::with('post')->where('state_id', 2)->get();
        $search = $request->search;
        
        if ($search){
            $post = Post::where('titre', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')
                    ->paginate(3)
                    ;
                    
                if (count($post) > 0){
                    return view('/test', compact('titles', 'instas', 'categories', 'tags', 'posts', 'comment'))->withDetails($post)->withQuery($search);
                }
        }
        return redirect('blog')->with('ded', 'No post found !');
    }

    public function post($id){
        $titles = Title::find(1);
        $post = Post::with('user', 'comment', 'tag', 'categorie')->find($id);
        $imageUsers = ImageUser::all();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();  
        
        

        return view('blogPost', compact('titles', 'instas', 'categories', 'tags', 'post', 'comment'));
    }

    public function searchTag(Request $request){
        $titles = Title::find(1)->first();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();      
        $posts = Post::where('state_id',2)->orderBy('id', 'desc')->paginate(3);
        $comment = Comment::with('post')->where('state_id', 2)->get();
        $search = $request->searchTag;
        $tag = Tag::where('nameTag', 'like', $search)->first();
        $posts = Post::all();
        $postArray = collect([]);
        foreach($posts as $post){
            if ($post->tag->contains($tag)){
                if ($post->state_id == 2){
                $postArray->push($post);
                }
            }
        }   
        if ($postArray->isEmpty()){
            return redirect('blog')->with('ded', 'No post found !');
        }
        return view('/test', compact('titles', 'instas', 'categories', 'tags', 'posts', 'comment'))->withDetails($postArray)->withQuery($search);
    }

    public function searchCategorie(Request $request){
        $titles = Title::find(1)->first();
        $instas = Instagram::all();
        $instas = $instas->random(6);
        $categories = Categorie::orderBy('nameCatego')->get();
        $tags = Tag::orderBy('nameTag')->get();      
        $posts = Post::where('state_id',2)->orderBy('id', 'desc')->paginate(3);
        $comment = Comment::with('post')->where('state_id', 2)->get();
        $search = $request->searchCategorie;
        $categorie = Categorie::where('nameCatego', 'like', $search)->first();
        $posts = Post::all();
        $postArray = collect([]);
        foreach($posts as $post){
            if ($post->categorie->contains($categorie)){
                if ($post->state_id == 2){

                    $postArray->push($post);
                }
            }
        }   
        if ($postArray->isEmpty()){
            return redirect('blog')->with('ded', 'No post found !');
        }
        return view('/test', compact('titles', 'instas', 'categories', 'tags', 'posts', 'comment'))->withDetails($postArray)->withQuery($search);
    }

    public function pending(){
        $comments = Comment::where('state_id', 1)->get();
        $posts = Post::where('state_id', 1)->get();
        $tags = Tag::where('state_id', 1)->get();
        $categories = Categorie::where('state_id', 1)->get();
        return view('pages.pending', compact('comments', 'posts', 'tags', 'categories'));
    }
}
