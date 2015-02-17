<nav class="navbar navbar-default bones-keeper" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand"><a href="http://genealabs.com" target="_blank" class="genea">GeneaLabs'</a> Bones:Library</span>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>{{ link_to_route('books.index', 'Books') }}</li>
        <li>{{ link_to_route('pages.index', 'Pages') }}</li>
      </ul>
      <span class="nav navbar-nav navbar-right">
        <a href="http://github.com/genealabs/bones-library" target="_blank" class="navbar-text"><span id="bonesKeeperInstalledVersion">v0.10.2</span> <span id="bonesLibraryCurrentVersion" class="badge label-danger"></span></a>
      </span>
    </div>
  </div>
</nav>
