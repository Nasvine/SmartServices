
<div class="col-sm-12 col-md-12  col-xl-12">
    <div class="card">
        <div class="card-header">
            <h5>Statistique du client</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Nombre total de course demandée</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($course_demandee )
                               <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $course_demandee  }}</span></h4>
                            @else
                               <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucune course</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="media">
                          <div class="media-body">
                            <div class="profit-card">
                              <div id="spaline-chart"></div>
                            </div>
                          </div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total sale&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;79.21%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;3465.56&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body p-0&quot;&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;div class=&quot;profit-card&quot;&gt;
                                        &lt;div id=&quot;spaline-chart&quot;&gt;&lt;/div&gt;
                                      &lt;/div&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt; 
                              </code>
                              </pre>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                         
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Nombre total de Livraison demandée</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($course_demandee )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $livraison_demandee  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucune Livraison</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Montant dépensé dans les courses</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($course_demandee )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $montant_depense_course  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucune course</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="media">
                          <div class="media-body">
                            <div class="profit-card">
                              <div id="spaline-chart"></div>
                            </div>
                          </div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total sale&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;79.21%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;3465.56&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body p-0&quot;&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;div class=&quot;profit-card&quot;&gt;
                                        &lt;div id=&quot;spaline-chart&quot;&gt;&lt;/div&gt;
                                      &lt;/div&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt; 
                              </code>
                              </pre>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Montant dépensé dans les livraisons</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($course_demandee )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $montant_depense_livraison  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucune livraison</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="monthly-visit">
                          <div id="column-chart"></div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total visits&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;95.56%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;5,953&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body pt-0&quot;&gt;
                                  &lt;div class=&quot;monthly-visit&quot;&gt;
                                    &lt;div id=&quot;column-chart&quot;&gt;&lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt;</code></pre>      
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Montant total des achats effectués dans les boutiques</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($montant_achat_boutique )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $montant_achat_boutique  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucun achat</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body p-0">
                        <div class="media">
                          <div class="media-body">
                            <div class="profit-card">
                              <div id="spaline-chart"></div>
                            </div>
                          </div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total sale&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;79.21%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;3465.56&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body p-0&quot;&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;div class=&quot;profit-card&quot;&gt;
                                        &lt;div id=&quot;spaline-chart&quot;&gt;&lt;/div&gt;
                                      &lt;/div&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt; 
                              </code>
                              </pre>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Montant des achats effectués dans les restaurants</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($montant_achat_restaurant )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $montant_achat_boutique  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucun achat</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="monthly-visit">
                          <div id="column-chart"></div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total visits&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;95.56%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;5,953&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body pt-0&quot;&gt;
                                  &lt;div class=&quot;monthly-visit&quot;&gt;
                                    &lt;div id=&quot;column-chart&quot;&gt;&lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt;</code></pre>      
                        </div>
                      </div>
                    </div>
                </div>
                <div class="col-xl-6 box-col-6 col-md-6">
                    <div class="card o-hidden">
                      <div class="card-header card-no-border">
                        <div class="card-header-right">
                          
                        </div>
                        <div class="media">
                          <div class="media-body">
                            <p><span class="f-w-500 font-roboto" style="font-size: 20px">Nombre de livreurs qui lui ont fait des livraisons</span><span class="f-w-700 font-primary ms-2"></span></p>
                            @if ($nombreDeLivreurs )
                                <h4 class="f-w-500 mb-0 f-20 text-center" style="color: #fe9003;"><span class="counter">{{ $nombreDeLivreurs->nombre_de_livreurs  }}</span></h4>
                            @else
                                <h4 class="f-w-500 mb-0 f-20 text-center"><span class="counter" style="color: #fe9003;">Aucun achat</span></h4>
                            @endif
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="monthly-visit">
                          <div id="column-chart"></div>
                        </div>
                        <div class="code-box-copy">
                          <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head1" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
                          <pre><code class="language-html" id="example-head1">&lt;!-- Cod Box Copy begin --&gt;
                              &lt;div class=&quot;card o-hidden&quot;&gt;
                                &lt;div class=&quot;card-header card-no-border&quot;&gt;
                                  &lt;div class=&quot;card-header-right&quot;&gt;
                                    &lt;ul class=&quot;list-unstyled card-option&quot;&gt;
                                      &lt;li&gt;&lt;i class=&quot;fa fa-spin fa-cog&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;view-html fa fa-code&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-maximize full-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-minus minimize-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-refresh reload-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                      &lt;li&gt;&lt;i class=&quot;icofont icofont-error close-card&quot;&gt;&lt;/i&gt;&lt;/li&gt;
                                    &lt;/ul&gt;
                                  &lt;/div&gt;
                                  &lt;div class=&quot;media&quot;&gt;
                                    &lt;div class=&quot;media-body&quot;&gt;
                                      &lt;p&gt;&lt;span class=&quot;f-w-500 font-roboto&quot;&gt;Month Total visits&lt;/span&gt;&lt;span class=&quot;f-w-700 font-primary ml-2&quot;&gt;95.56%&lt;/span&gt;&lt;/p&gt;
                                      &lt;h4 class=&quot;f-w-500 mb-0 f-20&quot;&gt;$&lt;span class=&quot;counter&quot;&gt;5,953&lt;/span&gt;&lt;/h4&gt;
                                    &lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                                &lt;div class=&quot;card-body pt-0&quot;&gt;
                                  &lt;div class=&quot;monthly-visit&quot;&gt;
                                    &lt;div id=&quot;column-chart&quot;&gt;&lt;/div&gt;
                                  &lt;/div&gt;
                                &lt;/div&gt;
                              &lt;/div&gt;
                              &lt;!-- Cod Box Copy end --&gt;</code></pre>      
                        </div>
                      </div>
                    </div>
                </div>
            
            
            </div>
            <div class="row">
              <h4>Historiques des commandes</h4> 
              <div class="table-responsive product-table">
                <table class="display" id="basic-1">
                  <thead>
                    <tr>
                      <th class="text-center">Type de commande</th>
                      <th class="text-center">Montant de la commande</th>
                      <th class="text-center">Nom du livreur</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  @if ($historique_commandes)
                    <tbody>
                      @foreach ($historique_commandes as $historique_commande)
                          <tr>
                              <td class="text-center">
                                  <h6> {{ $historique_commande->type_de_commande }}</h6>
                              </td>
                              <td class="text-center">
                                  <h6> {{ $historique_commande->montant_commande }}</h6>
                              </td>
                              <td class="text-center">
                                @if ($historique_commande->livreur)
                                {{ $historique_commande->livreur->first_name }} {{ $historique_commande->livreur->last_name }}</td>
                                @else
                                  Néant
                                @endif
                              </td>
                              <td class="text-center">{{ $historique_commande->status_commande }}</td>
                      
                          </tr>
                      @endforeach
                    </tbody>
                  @else
                    <p>Aucune commande effectuée.</p>
                  @endif
                </table>
              </div>
            </div>
        </div>
    </div>
</div>