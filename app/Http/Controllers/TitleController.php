<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Title;
use App\Icon;
use App\Service;
use ImageIntervention;
use App\Http\Requests\EditHomeRequest;
use App\Http\Requests\EditServicesRequest;
use App\Http\Requests\EditBlogRequest;
use App\Http\Requests\EditContactRequest;

class TitleController extends Controller
{
    public function index(){
        $titles = Title::all();
        $services = service::with('icon')->get();
      
        $services = Service::paginate(9);
        return view('welcome', compact('titles', 'icons', 'services'));
    }

    public function indexBlog(){
        $titles = Title::all();
        return view('blog', compact('titles'));
    }
    public function indexServices(){
        $titles = Title::all();
        $services = service::with('icon')->get();
      
        $services = Service::paginate(9);
        return view('services', compact('titles', 'services'));
    }
    public function indexContact(){
        $titles = Title::all();
        return view('contact', compact('titles'));
    }
    public function edit(){
        $titles = Title::all();
        return view('pages.editSite', compact('titles'));
    }

    public function update(EditHomeRequest $request, $id){
        $title = Title::find($id);
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




        
        
        // 
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
        return view('pages.editBlog', compact('titles'));
    }

    public function updateBlog(EditBlogRequest $request, $id){

        $title = Title::find($id);
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
}
