<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

<!-- Styles -->
<style>
    html, body {
        background-color: #ffffff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }

    h1, h2, h3, h4, h5, h6 {
        width: 100%;
        margin-bottom: 0.6em;
        margin-top: 1.6em;
    }

    h1 { font-size: 84px; }
    h2 { font-size: 48px; }
    h3 { font-size: 32px; }
    h4 { font-size: 24px; }
    h5 { font-size: 16px; }
    h6 { font-size: 12px; }

    ul > li { line-height: 1.5em; }

    .text-input {
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        color: #636b6f;
        padding: 4px 20px;
        border-radius: 7px;
        border: 1px solid #636b6f;
        box-shadow: 0px 12px 32px -16px #636b6f;
    }

    .chk-input {

    }

    .search-button button {
        font-family: 'Nunito', sans-serif;
        font-size: 22px;
        color: #ffffff;
        background-color: #636b6f;
        padding: 4px 20px;
        border-radius: 7px;
        border: 1px solid #636b6f;
        -webkit-box-shadow: 0px 12px 32px -15px #636b6f;
           -moz-box-shadow: 0px 12px 32px -15px #636b6f;
                box-shadow: 0px 12px 32px -15px #636b6f;
        margin-left: 10px;
        cursor: pointer;
    }

    .search-button:hover button {
        transform: translateY(4px);
        -webkit-box-shadow: 0px 12px 24px -10px #636b6f;
           -moz-box-shadow: 0px 12px 24px -10px #636b6f;
                box-shadow: 0px 12px 24px -10px #636b6f;
    }

    .hspace25 { margin-right: 25px; }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .flex-baseline {
        align-items: baseline;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }

    .content {
        text-align: center;
        flex: 1 0 auto;
    }

    .footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #ffffff;
        text-align: center;
        padding-top: 50px;
        padding-bottom: 30px;
    }

    .text {
        text-align: justify;
        margin-left: 20vw;
        width: 60vw;
        font-size: 18px;
    }

    .label {
        text-align: justify;
        font-size: 22px;
        margin-left: 0;
    }

    .title h1, .title h2, .title h3, .title h4, .title h5, .title h6 {
        margin-top: 0;
        padding-left: 2%;
        text-align: center;
    }

    span.bug { color: #8b0000; font-weight: 600; }
    span.fix { color: #006400; font-weight: 600; }
    span.issue { color: #b8860b; font-weight: 600; }

    .spacer {
        height: 50px;
    }

    .line-spacer {
        height: 25px;
    }

    code {
        font-family: "Courier New";
        background-color: #efefef;
        color: #444a4c;
        padding: 2px;
    }

    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 16px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .singlelink > span > a{
        color: #636b6f;
        font-weight: 600;
        text-display: underlined;
        text-decoration: none;
    }

    .links .disabled_link {
        color: rgba(99, 107, 111, 0.43) !important;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .btn-large button { padding: 8px 100px; }
    .btn-medium button { padding: 6px 60px; }
    .btn-small button { padding: 4px 40px; }

    /* Checkbox custom styles */

    [type="checkbox"]:not(:checked),
    [type="checkbox"]:checked {
        position: absolute;
        left: -9999px;
    }
    [type="checkbox"]:not(:checked) + label,
    [type="checkbox"]:checked + label {
        position: relative;
        padding-left: 1.95em;
        cursor: pointer;
    }

    /* checkbox aspect */
    [type="checkbox"]:not(:checked) + label:before,
    [type="checkbox"]:checked + label:before {
        content: '';
        position: absolute;
        left: 0; top: 0;
        width: 1.25em; height: 1.25em;
        border: 2px solid #ccc;
        background: #fff;
        border-radius: 4px;
        box-shadow: inset 0 1px 3px rgba(0,0,0,.1);
    }
    /* checked mark aspect */
    [type="checkbox"]:not(:checked) + label:after,
    [type="checkbox"]:checked + label:after {
        content: '\2713\0020';
        position: absolute;
        top: .15em; left: .22em;
        font-size: 1.3em;
        line-height: 0.8;
        color: #09ad7e;
        transition: all .2s;
        font-family: 'Lucida Sans Unicode', 'Arial Unicode MS', Arial;
    }
    /* checked mark aspect changes */
    [type="checkbox"]:not(:checked) + label:after {
        opacity: 0;
        transform: scale(0);
    }
    [type="checkbox"]:checked + label:after {
        opacity: 1;
        transform: scale(1);
    }
    /* disabled checkbox */
    [type="checkbox"]:disabled:not(:checked) + label:before,
    [type="checkbox"]:disabled:checked + label:before {
        box-shadow: none;
        border-color: #bbb;
        background-color: #ddd;
    }
    [type="checkbox"]:disabled:checked + label:after {
        color: #999;
    }
    [type="checkbox"]:disabled + label {
        color: #aaa;
    }
    /* accessibility */
    [type="checkbox"]:checked:focus + label:before,
    [type="checkbox"]:not(:checked):focus + label:before {
        border: 2px dotted blue;
    }

    /* hover style just for information */
    label:hover:before {
        border: 2px solid #4778d9!important;
    }

</style>
