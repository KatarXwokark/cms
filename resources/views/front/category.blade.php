<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Custom</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome5-overrides.min.css') }}">
</head>

<body id="page-top">

    <nav class="navbar navbar-light navbar-expand bg-gradient-primary shadow mb-4 topbar static-top">
        <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
            <ul class="nav navbar-nav flex-nowrap ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <div class="nav-item dropdown no-arrow">
                        <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                            <span class="d-none d-lg-inline mr-4 text-gray-300 large bold">
                                Our Products
                            </span>
                        </a>
                        <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in">
                            @foreach($categories as $category)
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('profile')}}">
                                &nbsp;{{$category->name}}
                            </a>
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>



    <div id="editorjs"></div>

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
        pageContent = JSON.parse("{{$products}}"
            .replace(/(&lt\;)/g, "<")
            .replace(/(&gt\;)/g, ">")
            .replace(/(=&quot\;)/g, "=\\\"")
            .replace(/(&quot\;\>)/g, "\\\"\>")
            .replace(/(&quot\;)/g, "\"")
        )

        var list = []
        for (x in pageContent) {
            link = "<a href=\"http://localhost:8000/product/" + pageContent[x].id + "\">" + pageContent[x].name + "<\/a>"
            element = [{
                    "type": "paragraph",
                    "data": {
                        "text": link,
                        "alignment": "left"
                    }
                },
                {
                    "type": "paragraph",
                    "data": {
                        "text": pageContent[x].description,
                        "alignment": "left"
                    }
                }
            ]
            list = list.concat(element)
        }

        console.log(list)

        const editor = new EditorJS({
            holderId: 'editorjs',
            readOnly: true,
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
            data: {
                "time": 1613597590172,
                "blocks": list,
                "version": "2.19.1"
            }
        });
    </script>

</body>

</html>