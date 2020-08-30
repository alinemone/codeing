@extends('Home.sections.master')
@section('content')
    @include('Home.sections.MobileSidebar')
    <!-- Page Content  -->
    <div id="content">
    @include('Home.sections.TopHeader')
    @include('Home.sections.ButtomHeader')
    <!-- body -->

        <div class="container pt-md-5 pt-3">
            <div class="row">
                <div class="col-md-12 dir-ltr">
                   <h1 class="h3">DMCA Digital Millennium Copyright Act {{config('app.url')}} ( {{config('app.name')}} )</h1>
                    <p class="text-dark">
                        <span class="font-weight-bold">{{config('app.url')}}  </span> is in full compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to any infringement notices and take appropriate actions under the Digital Millennium Copyright Act (“DMCA”) and other applicable intellectual property laws.
                    </p>
                    <p class="text-dark">
                        If your copyrighted material has been posted on {{config('app.url')}} or if links to your copyrighted material are returned through our search engine and you want this material removed, you must provide a written communication that details the information listed in the following section.
                    </p>
                    <p class="text-dark">
                        Please be aware that you will be liable for damages (including costs and attorneys’ fees) if you misrepresent information listed on our site that is infringing on your copyrights. We suggest that you first contact an attorney for legal assistance on this matter.

                    </p>
                    <ul>
                        <li>
                            Here we sale Plugins that make LTR themes to RTL support.
                        </li>
                        <li>
                            Products have been sent to us by other vendors for sale!
                        </li>
                    </ul>

                    <p class="text-dark"> If you think the product is in yours copyright, just contact us to info[at]domain remove it.</p>

                    <p class="text-dark font-weight-bold" >Dont forget to send reasons to proof your claim.</p>

                    <h2 class="h4">The following elements must be included in your copyright infringement claim:</h2>

                    <ul>
                        <li>Provide evidence of the authorized person to act on behalf of the owner of an exclusive right that is allegedly infringed.</li>
                        <li>Provide sufficient contact information so that we may contact you. You must also include a valid email address.</li>
                        <li>You must identify in sufficient detail the copyrighted work claimed to have been infringed and including at least one search term under which the material appears in website search results.</li>
                        <li>A statement that the complaining party has a good faith belief that use of the material in the manner complained of is not authorized by the copyright owner, its agent, or the law.</li>
                        <li>A statement that the information in the notification is accurate, and under penalty of perjury, that the complaining party is authorized to act on behalf of the owner of an exclusive right that is allegedly infringed.</li>
                        <li>Must be signed by the authorized person to act on behalf of the owner of an exclusive right that is allegedly being infringed.</li>
                        <li></li>
                    </ul>


                    <p class="text-dark font-weight-bold">
                        Send the written infringement notice to info[@] codirun [dot]shop
                    </p>
                    <p class="text-dark">
                        We inform you that due to problem with our search engine we can’t guarantee that all content will be deleted, please sent us direct links to each publication which contains your illegal material. Only in this case we can guarantee removal of all content.
                        Please allow 2/3 business days for an email response. Note that emailing your complaint to other parties such as our Internet Service Provider will not expedite your request and may result in a delayed response due the complaint not properly being filed.
                    </p>

                    <h6 class="h5">Regards - codirun community lawyer</h6>

                </div>
            </div>
        </div>



    @include('Home.sections.Footer')
    <!-- body -->
    </div>
    <div class="overlay"></div>
@endsection

