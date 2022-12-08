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

  <section class="tabs-content">
    <div id="tab1" class="show">
      <form class="get-input-form">
        <div class="form-group  IVR-Menu  ">
          <label id="action-label" class="right-label _field-label">Name</label>
          <input name="Name" type="text" value="Hangup_2" placeholder="Enter value"
            class="_field-value form-control form-control-sm" aria-required="true">
          <div id="input-feedback" class="invalid-feedback"></div>
        </div>
        <div class="form-group">
      
          <div  role="group" class="bv-no-focus-ring">
            <label  id="action-label"
              class="right-label _field-label">Hangup Reason</label>
              <select
              class="_field-value custom-select custom-select-sm" >
              <option  value="rejected" selected="selected">Rejected</option>
              <option  value="busy">Busy</option>
            </select>
       
          </div>
        </div>

        <div class="right-action-container">
          <div class="form-group mt-4">
            <div  role="group" class="bv-no-focus-ring">
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