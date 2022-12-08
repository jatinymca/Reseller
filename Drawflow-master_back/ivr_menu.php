<div class="card tabs-nav">
              <ul>
                <li class="head_panel active">
                  <a href="#tab1">Configuration</a>
                </li>
                <li class="head_panel">
                  <a href="#tab2">Information</a>
                </li>
              </ul>
                <a class="btn-closed" href="#!" onclick="hide()">X</a> 
              <!-- Tab panes -->
              <section class="tabs-content">
                <div id="tab1" class="show">
                  <form class="get-input-form">
                    <div class="form-group  IVR-Menu  ">
                      <label id="action-label" class="right-label _field-label">Name</label>
                      <input name="Name" type="text" value="IVR Menu_1" placeholder="Enter value" class="_field-value form-control form-control-sm" aria-required="true">
                      <div id="input-feedback" class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                        <label id="action-label" class="right-label _field-label">Allowed Inputs</label>
                        <div class="form-group allowed-choices _field-label">
                          <div tabindex="-1" role="group" class="bv-no-focus-ring">
                            <div role="group" tabindex="-1" data-toggle="buttons" class="btn-group btn-group-md round-button-container-sm ">
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 1 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1 "> 2 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 3 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1 "> 4 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 5 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 6 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 7 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1 "> 8 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> 9 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> # </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1 active"> 0 </button>
                              <button type="button" class="btn btn-outline-primary __btn-circle ml-1 mt-1"> * </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                        <label id="timeout-label" class="_field-label mt-4">Input Timeout in seconds</label>
                        <input id="timeout" name="input_timeout" type="number" placeholder="60" class="inline small-input _field-value form-control form-control-sm" data-vv-id="_9eamwsecj" aria-required="false" aria-invalid="false">
                        <div id="input-feedback" class="invalid-feedback"></div>
                        <div class="invalid-feedback-save"></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                        <div class="_field-label form-check">
                          <input type="checkbox" name="interrupt" class="form-check-input" value="true">
                          <label class="form-check-label"> Interrupt Audio on Input </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                        <div>
                          <h4 class="mt-4 mb-3 _field-label">Prompt</h4>
                          <div class="steps pt-3">
                            <ul class="steps-wrapper">
                              <li class="steps-item">
                                <span class="step-label">STEP 1</span>
                                <div>
                                  <div class="card auto-width-tabs">
                                    <div class="card-body">
                                      <div class="tabs_field-label">
                                        <div class="tabs_field-label-Nav ">
                                          <ul role="tablist" class="nav nav-pills">
                                            <li role="presentation" class="nav-item">
                                              <a role="tab" aria-selected="true" aria-setsize="2" aria-posinset="1" href="#speak_text" target="_self" class="nav-link active">Speak Text</a>
                                            </li>
                                            <li role="presentation" class="nav-item">
                                              <a role="tab" tabindex="-1" aria-selected="false" aria-setsize="2" aria-posinset="2" href="#upload_file" target="_self" class="nav-link">Upload File / URL</a>
                                            </li>
                                          </ul>
                                        </div>
                                        <div class="tab-content">
                                          <div id="speak_text" role="speak_text1" aria-hidden="false" class="tab-pane active">
                                            <div class="form-group">
                                              <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                                <div class="mt-3 mb-3 mr-0 ml-0">
                                                  <span> Text to speech processor: &nbsp;&nbsp;&nbsp;</span>
                                                  <div role="radiogroup" tabindex="-1" class="_field-label d-inline bv-no-focus-ring">
                                                    <div class="form-check form-check-inline">
                                                      <input type="radio" name="tab" value="igotnone" onclick="show2();">
                                                      <label class="form-check-label">Basic </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                      <input type="radio" name="tab" value="igotnone" onclick="show1();">
                                                      <label class="form-check-label">Amazon Polly</label>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div data-vv-name="text to speak for step 1" class="mt-2" data-vv-id="_y1jpy2nmi" aria-required="true" aria-invalid="false">
                                                  <div class="complete-box">
                                                    <textarea id="v-textcomplete-6nkkz2ii" rows="4" class="v-textcomplete__inner textcomplete" style="line-height: 20px;"></textarea>
                                                    <div id="autocomplete-6nkkz2ii" class="autocomplete transition" style="display: none;">
                                                      <ul></ul>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div>
                                              <div id="div1" class="hide mb-2">
                                                <div class="row">
                                                  <div class="col-md-6">
                                                    <div id="lang-label" class="form-group _field-label mb-2">
                                                      <legend id="lang-label__BV_label_" tabindex="-1" class="bv-no-focus-ring col-form-label pt-0"> Language </legend>
                                                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                                        <select class="_field-value custom-select custom-select-sm">
                                                          <option selected="selected" value="nl-NL"> Dutch </option>
                                                          <option selected="selected" value="en-AU"> English (Australia) </option>
                                                          <option selected="selected" value="en-GB"> English (United Kingdom) </option>
                                                          <option selected="selected" value="en-US"> English (United States) </option>
                                                          <option selected="selected" value="fr-FR"> French </option>
                                                          <option selected="selected" value="de-DE"> German </option>
                                                          <option selected="selected" value="it-IT"> Italian </option>
                                                          <option selected="selected" value="pl-PL"> Polish </option>
                                                          <option selected="selected" value="pt-BR"> Portuguese (Brazil) </option>
                                                          <option selected="selected" value="es-ES"> Spanish </option>
                                                          <option selected="selected" value="es-US"> Spanish (United States) </option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                    <div id="voice-label" class="form-group _field-label mb-2">
                                                      <legend id="voice-label__BV_label_" tabindex="-1" class="bv-no-focus-ring col-form-label pt-0"> Voice </legend>
                                                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                                        <select class="_field-value custom-select custom-select-sm">
                                                          <option value="MAN"> Man </option>
                                                          <option value="WOMAN"> Woman </option>
                                                        </select>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div id="upload_file" role="upload_file1" aria-hidden="true" class="tab-pane " style="display: none;">
                                            <div data-vv-name="url for file to play in step 1">
                                              <div>
                                                <div id="dropzone" class="vue-dropzone dropzone dz-clickable">
                                                  <div class="dz-default dz-message">
                                                    <button class="dz-button" type="button">Drop files here to upload</button>
                                                  </div>
                                                </div>
                                                <div class="m-2">
                                                  <div class="row">
                                                    <div class="audio-images col-2">
                                                      <img src="docs/img/wav.svg">
                                                      <img src="docs/img/mp3.svg">
                                                    </div>
                                                    <div class="upload-info col-10"> Drag an audio file or click on box to upload a file. <br> Max size 15MB in mp3 or wav file format. </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group bv-ring mt-2 mb-0">
                                          <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <label id="timeout-first-label" class="_field-label"> Wait for </label>
                                            <input id="timeout" type="number" placeholder="60" min="0" class="inline small-input _field-value form-control form-control-sm" data-vv-name="delay for step 1" aria-required="true">
                                            <label id="timeout-second-label" class="_field-label"> seconds before prompt.</label>
                                            <div id="input-feedback" class="invalid-feedback"></div>
                                          </div>
                                        </div>
                                        <div class="clearfix">
                                          <button type="button" class="btn pull-right __btn-text pr-0 btn-secondary">
                                            <i class="fa fa-cog" aria-hidden="true"></i>
                                            <span>Settings</span>
                                          </button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                              </li>
                              <li class="steps-item">
                                <span class="step-label _add">+ ADD</span>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div tabindex="-1" role="group" class="bv-no-focus-ring">
                        <div value="[object Object]">
                          <h4 class="mt-4 mb-4 ml-0 _section-label">Event Callbacks</h4>
                          <div class="steps events-url-steps">
                            <ul class="steps-wrapper">
                              <li class="steps-item head-step">
                                <span class="step-label">Event URL</span>
                              </li>
                              <li class="steps-item">
                                <div class="card auto-width-tabs">
                                  <div class="card-body">
                                    <div role="group" class="input-group flex">
                                      <div class="input-group-prepend">
                                        <select class="_field-value event-type-selector custom-select custom-select-sm">
                                          <option value="all">all</option>
                                          <option value="digits">digits</option>
                                        </select>
                                      </div>
                                      <div class="_field-value" aria-required="false" aria-invalid="false">
                                        <div class="complete-box">
                                          <input id="text" autocomplete="off" placeholder="Enter a Url" rows="1" name="event(0)" class="v-textcomplete__inner textcomplete" style="line-height: 20px;">
                                          <div id="autocomplete-97apqryo" class="autocomplete transition" style="display: none;">
                                            <ul div></ul>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="invalid-feedback" style="display: none;"> Please provide a valid url or variable </div>
                                    </div>
                                  </div>
                                </div>
                              </li>
                              <li class="steps-item">
                                <span class="step-label _add disabled"> + Add Event </span>
                              </li>
                            </ul>
                            <div class="invalid-feedback-save"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="right-action-container">
                      <div class="form-group mt-4">
                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                          <button type="submit" class="btn __btn-uno position-relative btn-secondary">
                            <span>Validate</span>
                            <div class="v-spinner" style="display: none;">
                              <div class="v-pulse v-pulse1" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.12s;"></div>
                              <div class="v-pulse v-pulse2" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.24s;"></div>
                              <div class="v-pulse v-pulse3" style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.36s;"></div>
                            </div>
                          </button>
                          <button type="button" class="btn ml-2 __btn-dos _stroked btn-secondary">Cancel</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div id="tab2" class="show hide">
                  <h3>Second Tab</h3>
                  <p>We don't have anything but happy trees here. See. We take the corner of the brush and let it play back-and-forth. You can work and carry-on and put lots of little happy things in here. Without washing the brush, I'm gonna go right into some Van Dyke Brown, some Burnt Umber, and a little bit of Sap Green. This is a fantastic little painting. The first step to doing anything is to believe you can do it. See it finished in your mind before you ever start.</p>
                </div>
              </section>
            </div>