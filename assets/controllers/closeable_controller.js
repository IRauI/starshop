import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    
    async close() {
        this.element.style.width = "0";

        await this.#waitForAnimation();
        this.element.remove();
    }

    //private method in js, asks el when the tranzitions are finished
    #waitForAnimation() {
        return Promise.all(
            this.element.getAnimations().map((animation) => animation.finished),
        );
    }
}
