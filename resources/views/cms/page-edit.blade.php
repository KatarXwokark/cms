<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>CMS</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon"><i class="fas fa-cloud"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>cms</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('profile')}}"><i class="fas fa-user"></i><span>Profile</span></a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('categories')}}"><i class="fa fa-list"></i><span>Categories</span></a>
                        <a class="nav-link" href="{{route('products')}}"><i class="fa fa-product-hunt"></i><span>Products</span></a>
                        <a class="nav-link " href="{{route('templates')}}"><i class="fas fa-table"></i><span>Templates</span></a>
                        <a class="nav-link active" href="{{route('pages')}}"><i class="fa fa-newspaper-o"></i><span>Pages</span></a>
                        @if ($user->userType > 1)
                        <a class="nav-link" href="{{route('users')}}"><i class="fa fa-users"></i><span>Users</span></a>
                        @endif
                    </li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">
                                            @isset($user->email)
                                            {{$user->email}}
                                            @endisset
                                        </span>
                                    </a>
                                    <div class=" dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item" href="{{route('profile')}}"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" id="logout" href="{{route('logout')}}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="container-fluid">

                    <label for="basic-url">Url:</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">http://{BASE_URL}/</span>
                        </div>
                        <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{$page->url}}">
                    </div>

                    <label>Layout:</label>

                    <div id="editorjs"></div>

                    <button id="save-button" class="btn btn-primary">Save</button>


                </div>

            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © cms 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

    </div>

    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/editorjs-paragraph-with-alignment@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/editorjs-alert@latest"></script>
    <script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>


    <script>
        var pageContent
        if ("{{$page->content}}".length > 0) {
            pageContent = JSON.parse(
                "{{$page->content}}"
                .replace(/(&lt\;)/g, "<")
                .replace(/(&gt\;)/g, ">")
                .replace(/(=&quot\;)/g, "=\\\"")
                .replace(/(&quot\;\>)/g, "\\\"\>")
                .replace(/(&quot\;)/g, "\"")
            )
        }
        else {
            pageContent = JSON.parse("{{$template->content}}"
                .replace(/(&quot\;)/g, "\"")
                .replace(/(&lt\;)/g, "<")
                .replace(/(&gt\;)/g, ">")
            )
        }

        const editor = new EditorJS({
            holderId: 'editorjs',
            readOnly: false,
            tools: {
                image: SimpleImage,
                header: Header,
                list: {
                    class: List,
                    inlineToolbar: true,
                },
                paragraph: {
                    class: Paragraph,
                    inlineToolbar: true,
                },
                alert: Alert,
                delimiter: Delimiter
            },
            data: pageContent
        });
        const saveButton = document.getElementById('save-button');
        saveButton.addEventListener('click', () => {

            url = $('#basic-url')[0].value

            editor.save().then(savedData => {
                output = {
                    "content": savedData,
                    "url": url
                }
                output = JSON.stringify(output, null, 4)
                console.log(output)

                $.ajax({
                    type: "PUT",
                    url: "/api/page/" + "{{$page->id}}",
                    contentType: "application/json",
                    dataType: 'json',
                    data: output,
                    success: function() {
                        alert('success');
                    },
                    error: function() {
                        alert('error');
                    }
                })
            })

        })
    </script>

</body>

</html>