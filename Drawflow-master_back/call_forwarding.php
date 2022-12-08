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
          <input name="Name" type="text" value="Initiate Call_1" placeholder="Enter value"
            class="_field-value form-control form-control-sm" aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">From</label>
          <input name="From" type="text" placeholder="Enter value" class="_field-value form-control form-control-sm"
            aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>

        <div class="form-group">
          <div class="bv-no-focus-ring">
            <label id="timeout-label" class="_field-label mt-4">To</label>
            <textarea rows="4" cols="50" class="form-control">
                </textarea>
            <div id="input-feedback" class="invalid-feedback"></div>
        
          </div>
        </div>
        <div class="form-group">
          <div class="bv-no-focus-ring">
            <div class="_field-label form-check">
              <input type="checkbox" name="interrupt" class="form-check-input" value="true">
              <label class="form-check-label"> Validate Caller ID </label>
            </div>
          </div>
        </div>
        <div class="form-group">

          <div class="bv-no-focus-ring">
            <label id="action-label" class="right-label _field-label">Settings</label>
            <div>
              <div class="form-group mb-0 ml-2">

                <div class="bv-no-focus-ring">
                  <label id="timeout-label" class="_field-label"> Send as input when call is answered</label><input
                    id="timeout" name="send_digits" type="text"
                    class="inline small-input _field-value form-control form-control-sm" data-vv-id="_aw4fgexbw"
                    aria-required="false" aria-invalid="false">
                  <div id="input-feedback" class="invalid-feedback">
                  </div>
                

                </div>
              </div>
              <div class="form-group mb-0 ml-2">

                <div class="bv-no-focus-ring">
                  <label id="timeout-label" class="_field-label"> Disconnect call after ringing for
                    (seconds)</label><input id="timeout" name="ring_timeout" type="number"
                    class="inline small-input _field-value form-control form-control-sm" data-vv-id="_ho7oa7pd7"
                    aria-required="true" aria-invalid="false">
                  <div id="input-feedback" class="invalid-feedback">
                  </div>
             

                </div>
              </div>
              <div class="form-group mb-0 ml-2">

                <div class="bv-no-focus-ring">
                  <label class="_field-label">Make calls to multiple destinations in</label><select
                    name="forwarding_option" class="inline _field-value custom-select custom-select-sm" placeholder="">
                    <option value="sequential">sequence</option>
                    <option value="parallel">parallel</option>
                  </select>

                </div>
                </fieldset>

              </div>

            </div>
          </div>
          <div class="form-group">
            <div class="bv-no-focus-ring">
              <div class="mt-3 mb-3 mr-0 ml-0">
                <span class="_field-label"><strong> Record Calls </strong></span>
                <div role="radiogroup" class="_field-label d-inline bv-no-focus-ring">
                  <div class="form-check form-check-inline">
                    <input type="radio" name="tab" value="igotnone" onclick="Always1();">
                    <label class="form-check-label">Always </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input type="radio" name="tab" value="igotnone" onclick="Dynamic1();">
                    <label class="form-check-label">Dynamic</label>
                  </div>
                </div>
              </div>
              <div class="mt-2" data-vv-id="_y1jpy2nmi" aria-required="true" aria-invalid="false">
                <div id="record-value" class="form-group _field-label">

                  <div id="Dynamic1" class="bv-no-focus-ring ">
                    <div size="sm" class="_field-value">
                      <div class="complete-box">
                        <input autocomplete="off" placeholder="The audio will record only if this variable is true"
                          rows="1" class="v-textcomplete__inner form-control textcomplete" c style="line-height: 20px;">
                      </div>
                    </div>
                    <div id="input-feedback" class="invalid-feedback"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">

            <div class="bv-no-focus-ring">
              <h4 class="mt-4 mb-3 _section-label">Call Screening Options</h4>
              <div class="ml-2 mb-2">
                <div class="_field-label form-check"><input type="checkbox" class="form-check-input" value="true"><label
                    class="form-check-label" for="__BVID__481">
                    Confirm Prompt
                  </label></div>
              </div>
            </div>
          </div>
          <div  aria-describedby="" class="form-group" id="__BVID__482">

            <div tabindex="-1" class="bv-no-focus-ring"><label  id="action-label"
                class="right-label _field-label">Custom Headers</label>
              <div  class="ml-0 _field-value">

                <div class="complete-box">
                  <textarea id="v-textcomplete-01moyno"
                    placeholder="Enter additional headers to send on the call. Ex: header1=value1,header2=value2,...,headerN=valueN"
                    rows="4" name="extra_headers" class="v-textcomplete__inner textcomplete"
                    style="line-height: 20px;"></textarea>


                </div>
              </div>
             

              </div>
            



            </div>
          </div>
          <div class="form-group">
            <div class="bv-no-focus-ring">
              <div value="[object Object]">
                <h4 class="mt-4 mb-4 ml-0 _section-label">Event Callbacks</h4>
                <div class="steps events-url-steps">
                  <ul class="steps-wrapper">
                    <li class="steps-item head-step">
                      <span class="step-label">Event URL</span>
                    </li>
                    <li class="steps-item">
                      <div class="card auto-width-tabs">
                        <div class="card auto-width-tabs">
                          <div class="card-body">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <select class="_field-value event-type-selector custom-select custom-select-sm">
                                  <option value="all">all</option>
                                  <option value="digits">digits</option>
                                </select>
                              </div>
                              <div class="_field-value flex" aria-required="false" aria-invalid="false">
                                <div class="complete-box">
                                  <input id="text" autocomplete="off" placeholder="Enter a Url" rows="1" name="event(0)"
                                    class="v-textcomplete__inner textcomplete" style="line-height: 20px;">
                                  <div id="autocomplete-97apqryo" class="autocomplete transition"
                                    style="display: none;">
                                    <ul div></ul>
                                  </div>
                                </div>
                              </div>
                              <div class="invalid-feedback" style="display: none;"> Please provide a valid url or
                                variable
                              </div>
                            </div>
                          </div>
                        </div>
                    </li>
                    <li class="steps-item">
                      <span class="step-label _add disabled"> + Add Event </span>
                    </li>
                  </ul>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="right-action-container">
            <div class="form-group mt-4">
              <div class="bv-no-focus-ring">
                <button type="submit" class="btn __btn-uno position-relative btn-secondary">
                  <span>Validate</span>
                  <div class="v-spinner" style="display: none;">
                    <div class="v-pulse v-pulse1"
                      style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.12s;">
                    </div>
                    <div class="v-pulse v-pulse2"
                      style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.24s;">
                    </div>
                    <div class="v-pulse v-pulse3"
                      style="background-color: rgb(255, 255, 255); width: 6px; height: 6px; margin: 2px; border-radius: 100%; display: inline-block; animation-name: v-pulseStretchDelay; animation-duration: 0.75s; animation-iteration-count: infinite; animation-timing-function: cubic-bezier(0.2, 0.68, 0.18, 1.08); animation-fill-mode: both; animation-delay: 0.36s;">
                    </div>
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
      <p>We don't have anything but happy trees here. See. We take the corner of the brush and let it play
        back-and-forth. You can work and carry-on and put lots of little happy things in here. Without washing the
        brush, I'm gonna go right into some Van Dyke Brown, some Burnt Umber, and a little bit of Sap Green. This is a
        fantastic little painting. The first step to doing anything is to believe you can do it. See it finished in your
        mind before you ever start.</p>
    </div>
  </section>
</div>