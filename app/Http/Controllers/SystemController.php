<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class SystemController extends Controller
{
    // Get System Options
    public function getOptions()
    {
        $data['options'] = Option::get();
        return view('admin.system.options', $data);
    }

    // Update System Options
    public function postOption(Request $request)
    {
        $option = Option::where('key', '=', 'app.name')->first();
        $option->value = $request->site_name ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.url')->first();
        $option->value = $request->site_url ?: $option->value;
        $option->save();

        if (isset($request->site_logo)) {
            $request->site_logo->move(public_path(), 'logo.svg');
        }

        if (isset($request->site_icon)) {
            $request->site_icon->move(public_path(), 'favicon.ico');
        }

        return back()->with(['flash_message_success' => 'Updated']);
    }

    // Get Robots.txt
    public function getRobot()
    {
        $data['robots'] = file_get_contents(public_path('robots.txt'));
        return view('admin.system.robots', $data);
    }

    // Save Robots.txt
    public function postRobot(Request $request)
    {
        file_put_contents(public_path('robots.txt'), $request->robots_txt);
        return back();
    }

    // Get .htaccess
    public function getHtaccess()
    {
        $data['htaccess'] = file_get_contents(public_path('.htaccess'));
        return view('admin.system.htaccess', $data);
    }

    // Save .htaccess
    public function postHtaccess(Request $request)
    {
        file_put_contents(public_path('.htaccess'), $request->htaccess);
        return back();
    }

    // Get Custom Codes
    public function getCode()
    {
        $data['header'] = file_get_contents(resource_path('views/admin/system/partials/code_header.blade.php'));
        $data['footer'] = file_get_contents(resource_path('views/admin/system/partials/code_footer.blade.php'));
        return view('admin.system.code', $data);
    }

    // Save Custom Codes
    public function postCodes(Request $request)
    {
        file_put_contents(resource_path('views/admin/system/partials/code_header.blade.php'), $request->custom_code_header);
        file_put_contents(resource_path('views/admin/system/partials/code_footer.blade.php'), $request->custom_code_footer);
        return back();
    }

    // Get Terms & Conditions
    public function getTerms()
    {
        $data['terms'] = file_get_contents(resource_path('views/admin/system/partials/terms_condition.blade.php'));
        return view('admin.system.terms_condition', $data);
    }

    // Save Terms & Conditions
    public function postTerms(Request $request)
    {
        file_put_contents(resource_path('views/admin/system/partials/terms_condition.blade.php'), $request->custom_code_terms);
        $option = Option::where('key', '=', 'app.terms')->first();
        $option->value = $request->custom_code_terms ?: $option->value;
        $option->save();
        return back();
    }

    // Get Website Contact Details
    public function getContactInfo()
    {
        $data['options'] = Option::get();
        return view('admin.system.contact_info', $data);
    }

    // Post Contact Details
    public function postContactInfo(Request $request)
    {
        $option = Option::where('key', '=', 'app.phone')->first();
        $option->value = $request->phone ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.email')->first();
        $option->value = $request->email ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.address')->first();
        $option->value = $request->address ?: $option->value;
        $option->save();

        $option = Option::where('key', '=', 'app.copyright')->first();
        $option->value = $request->copyright ?: $option->value;
        $option->save();
        return back()->with(['flash_message_success' => 'Terms & Conditions Updated!']);
    }
}
