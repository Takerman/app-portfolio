using System.Collections.Generic;

namespace Tanyo.Portfolio.Web.Models.Partials
{
    public class PricingTableModel
    {
        private int employmentTypeId;

        public PricingTableModel(int employmentTypeId)
        {
            this.employmentTypeId = employmentTypeId;
            switch (this.employmentTypeId)
            {
                case 1:
                    this.PaymentPeriod = "Year";
                    break;

                case 2:
                    this.PaymentPeriod = "Day";
                    break;
            }
        }

        public List<Price> Prices { get; set; }

        public string PaymentPeriod { get; set; }
    }
}